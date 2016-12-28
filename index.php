<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Japan</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.timepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Time Picker
            $('.time').timepicker({useSelect: true});

            // Tabs
            $("#tabs").tabs();

            // Day selector
            $('select[name="day"]').on('change', function () {
                $('.ui-timepicker-select').prop('disabled', $(this).val() == -1 ? 'disabled' : false);
                if ($(this).val() == -1) {
                    $('.timeLabel').css({color: '#666666'});
                } else {
                    $('.timeLabel').css({color: '#cccc99'});
                }
            }).val(-1).trigger('change');
        })
    </script>
</head>


<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>

    <main>
        <img src="images/japan.jpg" alt="japan" width="650" height="240">
        <p>In Japanese language the country Japan known as "Nihon" or "Nippon" is an island nation in East Asia. Japan
            is also known as the "Land of the Rising Sun", is a country where the past meets the future. Japanese
            culture stretches back millennia, yet has also adopted the latest modern fashions and trends. Although Japan
            adopted in modern fashion, their traditional lifestyle, culture, custom, language are completely different
            than modern fashion which is very impressive and enjoyable.</p><br/>

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Attractions</a></li>
                <li><a href="#tabs-2">Hotels</a></li>
                <li><a href="#tabs-3">Flights</a></li>
            </ul>
            <div id="tabs-1">
                <form action="attraction.php" method="get">
                    <label style="padding-right: 5px">Name <input type="text" name="name"></label>
                    <label>City <input type="text" name="city"></label><br><br>
                    <label style="padding-right: 5px"><select name="day">
                            <option value=-1>Anytime</option>
                            <option value=0>Sunday</option>
                            <option value=1>Monday</option>
                            <option value=2>Tuesday</option>
                            <option value=3>Wednesday</option>
                            <option value=4>Thursday</option>
                            <option value=5>Friday</option>
                            <option value=6>Saturday</option>
                        </select></label>
                    <label class="timeLabel" style="padding-right: 5px">From <input class="time" name="fromTime"
                                                                                    size="7"></label>
                    <label class="timeLabel">To <input class="time" name="toTime" size="7"></label><br><br>
                    <input type="submit" value="Search"/>
                </form>
            </div>
            <div id="tabs-2">
                <form class="searchSort" action="hotel.php" method="get">
                    <table>
                        <tr>
                            <td><input id="city" type="text" class="form-control" name="city" placeholder="City"></td>
                            <td><input id="HotelName" type="text" class="form-control" name="name"
                                       placeholder="Hotel Name"></td>
                            <td><input id="search" type="submit" class="form-control" value="Search"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="tabs-3">
                Coming soon!
            </div>
        </div>
        <br>

        <table border="1" cellspacing="0" cellpadding="5" width="95%" align="center">
            <tr>
                <td><a href="images/tample1.jpg" data-lightbox="cTable">
                        <img src="images/tample2.jpg" width="96" height="72" class="floatleft"/></a></td>
                <td><h3>Beautiful Temples and Gardens</h3>
                    <p>The temples in Japan have beautifully ornamented gates. Almost all the Buddhist temples in Japan
                        exhibit an uncanny similarity to the ones in China, indicating the country's source of Buddhism
                        as well as the architecture.</p>
                </td>
            </tr>

            <tr>
                <td><a href="images/kimono1.jpg" data-lightbox="cTable">
                        <img src="images/kimono2.jpg" width="96" height="72" class="floatleft"/></a></td>
                <td><h3>Impressive Traditional Cloths</h3>
                    <p>Traditional clothing of the Edo period, (1600-1868), included the kimono and obi as we know them
                        today. The obi did not, however, become a prominent part of a woman's ensemble until the mid Edo
                        period.</p>
                </td>
            </tr>

            <tr>
                <td><a href="images/sumo1.jpg" data-lightbox="cTable">
                        <img src="images/sumo2.jpg" width="96" height="72" class="floatleft"/></a></td>
                <td><h3>Traditional Sports Sumo</h3>
                    <p>Sumo Japanese national sports. Sumo wrestlers is styled like that of a warrior, wear only a
                        special silk belt and fight using only there bare hands. Most weigh between 100 and 200
                        kilograms.</p>
                </td>
            </tr>
        </table>

        <br/>
        <br/>

        <table border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td><img src="images/tokyo2.jpg" alt="japan" width="325" height="200"></td>
                <td><p>Tokyo, the capital of Japan, is one of the largest cities of the world with a population of
                        12.64 million. Its long history of prosperity started with the establishment of the shogunate by
                        Tokugawa Ieyasu in 1603. At that time, Tokyo was called Edo, which by the 18th century had grown
                        to a huge city of over a million people. It is now Japan's center for political, economic,
                        cultural, and various other activities as well as the origin for the dissemination of
                        information overseas.</p></td>

            </tr>
        </table>
    </main>

    <div id="right">
        <table border="0" cellspacing="0">
            <tr>
                <td><strong>Places to visit</strong><br>
                    <ul>
                        <li>Nikko: Tokogu Shrine</li>
                        <li>Tokyo: Harajuku</li>
                        <li>Hiroshima: Miyajima Island</li>
                    </ul>
                    <strong>Sources</strong><br>
                    <a href="http://www.yunessun.com/english/">www.yunessun.com</a><br>
                    <a href="http://www.jnto.go.jp/eng/">www.jnto.go.jp</a><br>
                    <a href="http://jvhirniak.hubpages.com/hub/Top-Ten-Places-to-Visit-in-Japan">Top ten places</a>
                </td>
            </tr>
        </table>
        <br/>

        <table border="0" cellspacing="0">
            <tr>
                <td><h4>Japanese Language</h4>
                    <img class="rightimages" src="images/kanji.jpg" alt="japan" width="100" height="70">
                    <p class="newsitem">The japanese language "nihongo" is a combination of three different scripts:
                        kanji, hiragana, and Katakana.</p></td>
            </tr>
        </table>


        <table border="0" cellspacing="0">
            <tr>
                <td><h4>Japanese Currency</h4>
                    <img class="rightimages" src="images/yen.jpg" alt="japan" width="100" height="70">
                    <p class="newsitem">The japanese "yen" is the official currency of Japan. It is the thired most
                        traded currency in the forgien
                        exchange market after the United States dollar and euro.</p></td>
            </tr>
        </table>
        <br/>

        <table border="1" cellspacing="0">
            <tr>
                <td><strong>ATTRACTIONS</strong><br/>
                    <a href="images/osakatemple1.jpg" data-lightbox="attractions">
                        <img src="images/osakatemple2.jpg" width="50" height="50" class="floatleft"/></a>
                    <p>Temples in Osaka&nbsp;</p></td>
            </tr>

            <tr>
                <td><a href="images/chainatown1.jpg" data-lightbox="attractions">
                        <img src="images/chainatown2.jpg" width="50" height="50" class="floatleft"/></a>
                    <p>Chinatown in Kobe</p></td>
            </tr>

            <tr>
                <td>
                    <a href="images/restaurant1.jpg" data-lightbox="attractions">
                        <img src="images/restaurant2.jpg" width="50" height="50" class="floatleft"/></a>
                    <p>Famous Restaurant Tokyo</p></td>
            </tr>

            <tr>
                <td>
                    <a href="images/Shinkansen1.jpg" data-lightbox="attractions">
                        <img src="images/Shinkansen2.jpg" width="50" height="50" class="floatleft"/></a>
                    <p>500 Series Bullet Train (Shinkansen) in Kyoto Station</p></td>
            </tr>
        </table>
    </div>
</div>
<footer><?php include 'footer.php' ?></footer>
<script type="text/javascript" src="js/lightbox.min.js"></script>
</body>
</html>
     

 