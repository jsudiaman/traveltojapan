<?php require_once('config.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Attractions of Japan</title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
        figure {
            text-align: center;
        }

        #mainImage {
            width: auto;
            max-height: 300px;
        }

        #map {
            height: 400px;
            width: 80%;
        }
    </style>

    <!-- Libraries -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>

    <!-- Page Specific -->
    <script type="text/javascript" src="js/attractiondetails.js"></script>
</head>

<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>
    <main>
        <?php
        if (empty($_GET['id'])) {
            echo 'Missing attraction number.';
            die();
        } else {
            require_once('config.php');

            try {
                $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
                $stmt = $pdo->prepare('SELECT * FROM Attractions WHERE attractionId = ?');
                $stmt->execute([$_GET['id']]);

                if ($row = $stmt->fetch()) {
                    echo "<h3>{$row['name']}</h3>";
                    echo "<figure><img id='mainImage' src='{$row['photourl']}' alt='{$row['name']}'></figure><br>";
                    echo "<p>{$row['longDesc']}</p><br>";
                } else {
                    echo "Attraction {$_GET['id']} not found.";
                    die();
                }
            } catch (PDOException $e) {
                echo 'Could not connect to the database.';
            } finally {
                $pdo = null;
            }
        }
        ?>

        <section id="location">
            <h3>Location</h3>
            <div id="map"></div>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_API ?>&libraries=places&callback=initMap"></script>
            <br>
        </section>

        <section id="hours">
            <h3>Hours</h3>
        </section>

        <section id="photos">
            <h3>Photos</h3>
        </section>

        <section id="reviews">
            <h3>Reviews</h3>
            <div id="readReviews"></div>
            <form id="writeReviews">
                <fieldset>
                    <legend><strong>Write a Review</strong></legend>
                    <label>Name*<br><input name="name" type="text" autocomplete="off" required></label><br><br>
                    <label>Email*<br><input name="email" type="email" autocomplete="off" required></label><br><br>
                    <label>Rating*<br><select name="rating" autocomplete="off" required>
                            <option value=0 disabled selected>Choose Rating</option>
                            <option value=5>5 - Fantastic</option>
                            <option value=4>4 - Great</option>
                            <option value=3>3 - Okay</option>
                            <option value=2>2 - Bad</option>
                            <option value=1>1 - Horrible</option>
                        </select></label><br><br>
                    <label>Comments<br><textarea name="comment" cols="60" rows="10" autocomplete="off"></textarea></label><br><br>
                    Fields marked with a * are required.<br>
                    <input type="submit" value="Submit Review">
                </fieldset>
            </form>
            <br>
        </section>
        <span id="backLink"></span>
    </main>
</div>
<footer><?php include 'footer.php' ?></footer>
<script type="text/javascript" src="js/lightbox.min.js"></script>
</body>

</html>
