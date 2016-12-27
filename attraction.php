<?php require_once('config.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Attractions of Japan</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css">

    <!-- Libraries -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="js/underscore-min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>

    <!-- APIs -->
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_API ?>&libraries=places"></script>

    <!-- Page Specific -->
    <script src="attraction.js" type="text/javascript"></script>
</head>

<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>
    <main>
        <form action="attraction.php" method="get">
            <fieldset>
                <legend>Search Options</legend>
                <label>Name: <input type="text" name="name"
                                    value="<?php echo (isset($_GET['name'])) ? $_GET['name'] : '' ?>">&nbsp;</label>
                <label>City: <input type="text" name="city"
                                    value="<?php echo (isset($_GET['city'])) ? $_GET['city'] : '' ?>">&nbsp;</label>
                <label>Day: <select name="day">
                        <option value=-1>Anytime</option>
                        <option value=0>Sunday</option>
                        <option value=1>Monday</option>
                        <option value=2>Tuesday</option>
                        <option value=3>Wednesday</option>
                        <option value=4>Thursday</option>
                        <option value=5>Friday</option>
                        <option value=6>Saturday</option>
                    </select>
                    &nbsp;</label>
                <label class="timeLabel">From: <input class="time" name="fromTime" size="7"
                                                      value="<?php echo (isset($_GET['fromTime'])) ? $_GET['fromTime'] : '' ?>">&nbsp;
                </label>
                <label class="timeLabel">To: <input class="time" name="toTime" size="7"
                                                    value="<?php echo (isset($_GET['toTime'])) ? $_GET['toTime'] : '' ?>">&nbsp;
                </label>
                <br><br>
                <input type="submit" value="Search"/>
                <input id="searchClear" type="button" value="Clear"/>
            </fieldset>
        </form>
        <?php
        try {
            $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);

            // Pagination
            $lim = 5;
            $page = 0;
            if (!empty($_GET['page'])) {
                $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
                if (false === $page) {
                    $page = 0;
                }
            }
            $off = $lim * $page;

            // Day
            $day = -1;
            if (!empty($_GET['day'])) {
                $day = filter_input(INPUT_GET, 'day', FILTER_VALIDATE_INT);
                if (false === $day) {
                    $day = -1;
                }
            }

            // Set where statement with parameters
            if (!empty($_GET['name']) && !empty($_GET['city'])) {
                $where = 'WHERE Attractions.name LIKE ? AND Attractions.city = ?';
                $arr = ['%' . $_GET['name'] . '%', $_GET['city']];
            } elseif (!empty($_GET['name'])) {
                $where = 'WHERE Attractions.name LIKE ?';
                $arr = ['%' . $_GET['name'] . '%'];
            } elseif (!empty($_GET['city'])) {
                $where = 'WHERE Attractions.city = ?';
                $arr = [$_GET['city']];
            } else {
                $where = '';
                $arr = [];
            }

            // Set limit string
            if ($day > -1 && $day < 7) {
                $limStr = '';
            } else {
                $limStr = "LIMIT {$lim} OFFSET {$off}";
            }

            $stmt = $pdo->prepare('SELECT SQL_CALC_FOUND_ROWS Attractions.*, AVG(rating) AS rating, COUNT(rating) AS numRating '
                . 'FROM Attractions '
                . 'LEFT JOIN AttractionReviews USING(attractionId) '
                . $where . ' '
                . 'GROUP BY Attractions.attractionId '
                . $limStr);
            $stmt->execute($arr);
            $numRows = $pdo->query('SELECT FOUND_ROWS()')->fetchColumn();

            while ($row = $stmt->fetch()) {
                echo "<section class='attraction' data-gPlaceId='{$row['gPlaceId']}'><br><table border='3' cellspacing='0' cellpadding='5'><tr>";
                echo "<td><a href='attractiondetails.php?id={$row['attractionId']}&gPlaceId={$row['gPlaceId']}'>";
                echo "<img src='{$row['photourl']}' alt='{$row['name']}' width='150' height='100' class='floatleft'></a></td>";
                echo "<td width='100%'><h3>{$row['name']}</h3><p>{$row['shortDesc']}</p><br><div class='visitIntervals'></div>";
                if ($row['numRating'] > 0) {
                    echo '<div class="rating">';
                    $rating = round($row['rating']);
                    for ($i = 0; $i < $rating; $i++) {
                        echo '<img src="star-orange.png" alt="Orange Star">';
                    }
                    for ($i = 0; $i < 5 - $rating; $i++) {
                        echo '<img src="star-white.png" alt="White Star">';
                    }
                    echo " {$row['numRating']} Ratings";
                    echo '</div>';
                } else {
                    echo '<div class="rating">';
                    for ($i = 0; $i < 5; $i++) {
                        echo '<img src="star-white.png" alt="White Star">';
                    }
                    echo " 0 Ratings";
                    echo '</div>';
                }
                echo "<a href='attractiondetails.php?id={$row['attractionId']}&gPlaceId={$row['gPlaceId']}'>More details</a></td>";
                echo "</tr></table></section>";
            }

            $prev = http_build_query(array_merge($_GET, array("page" => $page - 1)));
            $next = http_build_query(array_merge($_GET, array("page" => $page + 1)));

            if (!empty($limStr)) {
                echo "<br>";
                if ($page > 0) {
                    echo "<span style=\"float:left;\"><a href='attraction.php?{$prev}'>Previous Page</a></span>";
                }

                if (($page + 1) * $lim < $numRows) {
                    echo "<span style=\"float:right;\"><a href='attraction.php?{$next}'>Next Page</a></span>";
                }
            }
        } catch (PDOException $e) {
            echo 'Could not connect to the database.';
        } finally {
            $pdo = null;
        }
        ?>
    </main>
</div>
<footer><?php include 'footer.php' ?></footer>
</body>

</html>
