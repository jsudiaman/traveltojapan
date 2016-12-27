<?php require_once('config.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Information</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        #map {
            height: 400px;
            width: 70%;
            margin: auto;
        }
    </style>
    <script type="text/javascript">
        function initMap() {
            var loc = {lat: 36.598470, lng: 138.242042};
            var map = new google.maps.Map(document.getElementById('map'), {
                scrollwheel: false,
                zoom: 6,
                center: loc
            });
        }
    </script>
</head>

<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>
    <main>
        <br/>
        <table border="5" align="center" cellspacing="0" width="70%" cellpadding="5">
            <caption><img src="imageinformation/flag.jpg" alt="flag" width="50" height="50">
                <h2>INFORMATION OF TRAVEL TO JAPAN</h2></caption>
            <tr>
                <td>
                    <p>Japan Airlines: <a href="http://www.jal.co.jp/en/">www.jal.co.jp</a></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Japan Airlines Worldwide: <a href="http://www.jal.com/">www.jal.com</a></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Discover Hotels in Japan: <a href="http://www.discover-japan.info/">www.discover-japan.info</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Famous Restaurants in Japan: <a href="http://www.japan-guide.com/e/e2036.html">www.japan-guide.com</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Skiing information in Japan: <a href="http://www.welovesnow.com/eng/">www.welovesnow.com</a>
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <h2 align="center">MAP OF JAPAN</h2>
        <div id="map"></div>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_API ?>&callback=initMap"></script>
    </main>
</div>
<footer><?php include 'footer.php' ?></footer>
</body>

</html>
