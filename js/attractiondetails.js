"use strict";

var params = urlObject().parameters;

/**
 * Remove API-dependent content.
 */
function removeApiContent() {
    document.getElementById('location').outerHTML = "";
    document.getElementById('hours').outerHTML = "";
    document.getElementById('photos').outerHTML = "";
}

function initMap() {
    var placeId = params['gPlaceId'];
    if (!placeId || placeId === '') {
        removeApiContent();
        return;
    }

    var map = document.getElementById('map');

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails({
        placeId: placeId
    }, function (place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            // Location
            map = new google.maps.Map(document.getElementById('map'), {
                scrollwheel: false,
                center: {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent('<div style="color: #000000"><strong>' + place.name + '</strong><br>' +
                    place.formatted_address + '</div>');
                infowindow.open(map, this);
            });
            google.maps.event.trigger(marker, 'click');

            // Hours
            if (place['opening_hours']) {
                $('#hours').append(place['opening_hours']['weekday_text'].join('<br>')).append("<br><br>");
            } else {
                document.getElementById('hours').outerHTML = "";
            }

            // Photos
            var photos = place['photos'];
            if (photos) {
                var photosSection = $('#photos');
                for (var i = 0; i < photos.length && i < 9; i++) {
                    var src = photos[i].getUrl({
                        'maxWidth': 250,
                        'maxHeight': 250
                    });
                    var largeSrc = photos[i].getUrl({
                        'maxWidth': 800,
                        'maxHeight': 800
                    });
                    photosSection.append("<a href='" + largeSrc + "' data-lightbox='photo'>" +
                        "<img src='" + src + "' alt='Photo' width='250' height='250'></a>");
                }
                photosSection.append("<br><br>");
            } else {
                document.getElementById('photos').outerHTML = "";
            }
        } else {
            removeApiContent();
        }
    });
}

$(document).ready(function () {
    $('#backLink').html('<a href="' + document.referrer + '">Go Back</a>');

    // Fetch reviews through AJAX
    var showAllHandler = function (event) {
        $.ajax({
            url: '/service/fetchreviews.php',
            type: 'GET',
            data: {id: params['id']},
            success: function (data) {
                $('#readReviews').html(data);
            }
        });

        event.preventDefault();
        return false;
    };
    $.ajax({
        url: '/service/fetchreviews.php',
        type: 'GET',
        data: {id: params['id'], limit: 5},
        success: function (data, textStatus, xhr) {
            if (xhr.status === 204) {
                $('#readReviews').html("Be the first one to leave a review!<br><br>");
            } else {
                $('#readReviews').html(data);
                $('#showAll').click(showAllHandler);
            }
        }
    });

    // Submit reviews through AJAX
    $('#writeReviews').on('submit', function (event) {
        var data = $(this).serializeArray();
        data.push({name: "attractionId", value: params['id']});

        $.ajax({
            url: '/service/submitreview.php',
            type: 'GET',
            data: data,
            success: function () {
                $('#writeReviews').html("Thanks for your review!");
            }
        });

        // Prevent actual submission from happening
        event.preventDefault();
        return false;
    })
});
