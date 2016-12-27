<!DOCTYPE html>
<html>
<head>
    <title>Hotels</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>
    <main>
        <br>
        <table border="5" align="center" cellspacing="0" width="70%" cellpadding="5">
            <caption><h2>JAPANESE HOTELS</h2></caption>
            <tr>
                <td><a href="#shiraume">Shiraume</a></td>
            </tr>
            <tr>
                <td><a href="#The Ritz-Carlton">The Ritz-Carlton</a></td>
            </tr>
            <tr>
                <td><a href="#bath">HOTEL MYSTAYS Kyoto Shijo</a></td>
            </tr>
            <tr>
                <td><a href="#cuis">Ryokan Sawanoya</a></td>
            </tr>
        </table>
        <br>
        <table border="3" cellspacing="0" cellpadding="5" width="95%" align="center">
            <tr>
                <td>
                    <a href="HotelDetail.php?hotelId=1"><img src="hotelImg/1.jpg" width="100" height="100"
                                                             class="floatleft"/></a>
                </td>
                <td>
                    <h3 id="shiraume">Shiraume</h3>
                    <p>The area where the Shiraume Ryokan is located is one of the most beautiful and historical areas
                        in Kyoto, the Gion district. Gion, day and night, is still very much a living world of elegant
                        and traditional sophistication, charms and mysteries. Here the geiko and maiko (apprentice
                        geiko) live, study and work against a backdrop of old cherry and willow trees along the
                        Shirakawa Stream and the polished grand wooden facades of Hanamikoji and the many fascinating
                        back lanes.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="HotelDetail.php?hotelId=2"><img src="hotelImg/2.jpg" width="100" height="100"
                                                             class="floatleft"/></a>
                </td>
                <td>
                    <h3 id="The Ritz-Carlton">The Ritz-Carlton</h3>
                    <p>The Ritz-Carlton, Kyoto, the first luxury urban resort in Japan, sits on the banks of the
                        Kamogawa river, with sweeping views of the famous Higashiyama mountains. The resort features 134
                        guest rooms with traditional Japanese motifs, four restaurants and bars including modern
                        Japanese cuisine and a spa for the ultimate rejuvenation.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="HotelDetail.php?hotelId=3"><img src="hotelImg/3.jpg" width="100" height="100"
                                                             class="floatleft"/></a>
                </td>
                <td>
                    <h3 id="bath">HOTEL MYSTAYS Kyoto Shijo</h3>
                    <p>Enjoy our hotel's modern Japanese design as you explore the historic capital. We are located in
                        the heart of Kyoto, with easy access to all major tourist destinations. Step outside and it's
                        only a short walk to Nijo Castle or Yasaka Shrine. Step inside and take in an undeniably
                        Japanese, yet modern, decor. Perhaps that's why we've received TripAdvisor's Certificate of
                        Excellence annually since 2011.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="HotelDetail.php?hotelId=4"><img src="hotelImg/4.jpg" width="100" height="100"
                                                             class="floatleft"/></a>
                </td>
                <td>
                    <h3 id="cuis">Ryokan Sawanoya</h3>
                    <p>Located in "Shitamachi" of Tokyo where the traditional folksy life style is still preserved, our
                        Inn gives you the unusual opportunity to see and interact with a real neighborhood. we are close
                        to Ueno Park,museums,concert hall.</p>
                </td>
            </tr>
        </table>
        <br>
        <table border="5" align="center" cellspacing="0" width="70%" cellpadding="5">
            <caption><h2>More About Hotels</h2></caption>
            <tr>
                <td><a href="http://travel.com">Search For More On Travel.com</a></td>
            </tr>
            <tr>
                <td><a href="http://www.google.com/maps/place/japan">Find More on Google Map</a></td>
            </tr>
        </table>
    </main>
</div>
<footer><?php include 'footer.php' ?></footer>
</body>
</html>
