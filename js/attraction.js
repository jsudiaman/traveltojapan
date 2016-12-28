"use strict";

// URL parameters
var params = urlObject().parameters;
var day = params['day'];
var from = params['fromTime'];
var to = params['toTime'];

/**
 * Get a numeric form (HHMM, 24-hour format) of the given time.
 *
 * @param time The time, as passed in through URL parameters.
 */
function getNumericTime(time) {
    var nTime = parseInt(time.replace(/%3A|am|pm/g, ""));
    if (time.startsWith('12') && time.endsWith('am')) {
        nTime -= 1200;
    } else if (!time.startsWith('12') && time.endsWith('pm')) {
        nTime += 1200;
    }
    return nTime;
}

/**
 * Compute time intervals in which the user can visit the attraction.
 *
 * @param place The attraction
 */
function getVisitIntervals(place) {
    var openTimes = [];

    // Get open/close periods
    var periods = place['opening_hours']['periods'];
    for (var i = 0; i < periods.length; i++) {
        var open = periods[i]['open'];
        var close = periods[i]['close'];
        var nFrom = getNumericTime(from);
        var nTo = getNumericTime(to);

        if (day == open['day']) {
            if (!(nFrom >= close['time'] || nTo <= open['time'])) {
                openTimes.push({open: open['time'], close: close['time']});
            } else if (nTo < nFrom) {
                // Support next day rollover
                if (!(nFrom >= close['time'] || 2359 <= open['time'])
                    || !(0 >= close['time'] || nTo <= open['time'])) {
                    openTimes.push({open: open['time'], close: close['time']});
                }
            }
        }
    }
    // Return periods
    return openTimes;
}

/**
 * Reset all search parameters.
 */
function resetSearch() {
    location.href = '../attraction.php';
}

$(document).ready(function () {
    // Time Picker
    $('.time').timepicker();

    // Search Clear
    $('#searchClear').click(resetSearch);

    // Day Selector
    if (day == null) {
        day = -1;
    }
    if (day == -1) {
        $('.time').val("");
    }
    $('select[name="day"]').on('change', function () {
        $('.time').prop('disabled', $(this).val() == -1);
        if ($(this).val() == -1) {
            $('.timeLabel').css({color: '#666666'});
        } else {
            $('.timeLabel').css({color: '#cccc99'});
        }
    }).val(day).trigger('change');

    // Places API
    $('.attraction').each(function (i, table) {
            // Declare variables
            var placeId = $(this).attr('data-gPlaceId');

            // Service required?
            if (day == -1 || placeId === "") return;

            // Use service
            var isValidTime = function (time) {
                return /^([1-9]|1[0-2])%3A[0-5][0-9](am|pm)$/.test(time);
            };
            if (!isValidTime(from)) {
                from = '0';
            }
            if (!isValidTime(to)) {
                to = '2359';
            }
            var request = {'placeId': placeId};
            var callback = function (place, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    if (!place['opening_hours']) {
                        table.outerHTML = ""; // Hide table
                        return;
                    }

                    var intervals = getVisitIntervals(place);
                    if (intervals.length) {
                        // Convert intervals to readable format
                        intervals = _.map(intervals, function (ival) {
                            var convertTo12Hr = function (hours) {
                                return {
                                    hours: ((hours + 11) % 12 + 1),
                                    suffix: hours >= 12 ? "PM" : "AM"
                                };
                            };

                            // Open
                            var open = ival['open'];
                            var oHr = parseInt(open.substring(0, 2));
                            var oMin = open.substring(2);
                            var o12Hr = convertTo12Hr(oHr);

                            // Close
                            var close = ival['close'];
                            var cHr = parseInt(close.substring(0, 2));
                            var cMin = close.substring(2);
                            var c12Hr = convertTo12Hr(cHr);
                            return o12Hr['hours'] + ':' + oMin + o12Hr['suffix'] + '-' + c12Hr['hours'] + ':' + cMin + c12Hr['suffix'];
                        });

                        // Display them
                        var el = table.getElementsByClassName('visitIntervals')[0];
                        var sDay = {
                            0: 'Sunday',
                            1: 'Monday',
                            2: 'Tuesday',
                            3: 'Wednesday',
                            4: 'Thursday',
                            5: 'Friday',
                            6: 'Saturday'
                        }[day];
                        el.innerHTML = '<p>On <strong>' + sDay + '</strong>, you may visit during the following times: ' + intervals + '</p><br>';
                    } else {
                        table.outerHTML = ""; // Hide table
                    }
                }
            };
            var service = new google.maps.places.PlacesService(document.createElement('div'));
            service.getDetails(request, callback);
        }
    );
});
