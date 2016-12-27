<?php
require_once('config.php');

try {
    $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
    $stmt = $pdo->prepare("INSERT INTO AttractionReviews (rating, name, email, comment, attractionId) VALUES (?,?,?,?,?)");
    $stmt->execute([$_GET['rating'], $_GET['name'], $_GET['email'], $_GET['comment'], $_GET['attractionId']]);
    http_response_code(200);
} catch (PDOException $e) {
    http_response_code(500);
} finally {
    $pdo = null;
}
