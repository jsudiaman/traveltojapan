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
        <?php
        require_once('config.php');

        try {
            $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
            $stmt = $pdo->prepare("SELECT * FROM hoteldetails WHERE ID = ?");
            $stmt->execute([$_GET['hotelId']]);

            if ($row = $stmt->fetch()) {
                ?>
                <img src="<?php echo $row['PhotoM']; ?>" alt="<?php echo $row['Name']; ?>" height="250" width="250"
                     class='floatleft'/>
                <h1><?php echo $row['Name']; ?></h1><br>
                <table>
                    <tr>
                        <p><?php echo $row['Description']; ?></p>
                    </tr>
                    <tr>
                        <td>
                            <p>Address: <?php echo $row['Address']; ?></p>
                        </td>
                        <td>
                            <p>City: <?php echo $row['City']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Phone Number: <?php echo $row['Phone']; ?></p>
                        </td>
                        <td>
                            <p>Average Price: <?php echo $row['Price']; ?></p>
                        </td>
                        <td>
                            <p>Over All Rating: <?php echo $row['Rate']; ?></p>
                        </td>
                    </tr>
                </table>
                <a href="attraction.php?city=<?php echo $row['City']; ?>"><p>Find More Attraction Near This</p></a>
            <?php }
        } catch (PDOException $e) {
            echo 'Could not connect to the database.';
        } finally {
            $pdo = null;
        } ?>
    </main>
</div>
<footer><?php include 'footer.php' ?></footer>
</body>
</html>
