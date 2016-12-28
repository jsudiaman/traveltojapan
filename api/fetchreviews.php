<?php
require_once('config.php');

try {
    $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);

    // Limit
    $lim = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
    if (false === $lim) {
        $lim = 0;
    }

    // Execute SQL
    $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM AttractionReviews '
        . 'WHERE attractionId = ? AND LENGTH(comment) > 0 '
        . 'ORDER BY reviewId DESC ';
    if ($lim > 0) {
        $sql = $sql . "LIMIT {$lim}";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $numRows = $pdo->query('SELECT FOUND_ROWS()')->fetchColumn();

    if ($numRows == 0) {
        http_response_code(204);
    } else {
        while ($row = $stmt->fetch()) {
            echo "<h2><a href='mailto:{$row['email']}'>{$row['name']}</a></h2>";
            $rating = $row['rating'];
            for ($i = 0; $i < $rating; $i++) {
                echo '<img src="../images/star-orange.png" alt="Orange Star">';
            }
            for ($i = 0; $i < 5 - $rating; $i++) {
                echo '<img src="../images/star-white.png" alt="White Star">';
            }
            echo "<p>{$row['comment']}</p><hr>";
        }
    }

    if ($lim > 0 && $numRows > $lim) {
        echo '<a id="showAll" href="#">Show All Reviews</a><br><br>';
    }
} catch (PDOException $e) {
    echo 'Could not connect to the database.';
} finally {
    $pdo = null;
}
