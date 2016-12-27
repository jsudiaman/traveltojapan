<!DOCTYPE html>
<html>
<head>
    <title>Japan-Hotels</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1 id="top"><?php include 'banner.php' ?></h1>
<div id="flexbox">
    <nav><?php include 'navbar.php' ?></nav>
    <main>
        <form class="searchSort" action="HotelResult.php" method="get">
            <table>
                <tr>
                    <td>
                        <input id="city" type="text" class="form-control" name="city"
                               value="<?php echo (isset($_GET['city'])) ? $_GET['city'] : '' ?>" placeholder="City">
                    </td>
                    <td>
                        <input id="HotelName" type="text" class="form-control" name="name"
                               value="<?php echo (isset($_GET['name'])) ? $_GET['name'] : '' ?>"
                               placeholder="Hotel Name">
                    </td>
                    <td>
                        <input id="search" type="submit" class="form-control" value="Search">
                    </td>
                </tr>
            </table>
        </form>
        <table border="3" cellspacing="0" cellpadding="5">
            <?php
            require_once('config.php');

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

                if (!empty($_GET['name']) && !empty($_GET['city'])) {
                    $stmt = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM hotels WHERE name LIKE ? AND city = ? LIMIT {$lim} OFFSET {$off}");
                    $stmt->execute(['%' . $_GET['name'] . '%', $_GET['city']]);
                } elseif (!empty($_GET['name'])) {
                    $stmt = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM hotels WHERE name LIKE ? LIMIT {$lim} OFFSET {$off}");
                    $stmt->execute(['%' . $_GET['name'] . '%']);
                } elseif (!empty($_GET['city'])) {
                    $stmt = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM hotels WHERE city = ? LIMIT {$lim} OFFSET {$off}");
                    $stmt->execute([$_GET['city']]);
                } else {
                    $stmt = $pdo->query("SELECT SQL_CALC_FOUND_ROWS * FROM hotels LIMIT {$lim} OFFSET {$off}");
                }
                $numRows = $pdo->query('SELECT FOUND_ROWS()')->fetchColumn();

                while ($row = $stmt->fetch()) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $row['Photo']; ?>" alt="<?php echo $row['Name']; ?>" height="150"
                                 width="150" class='floatleft'/></td>
                        <td>
                            <h3 align="center"><?php echo $row['Name']; ?></h3>
                            <p>Address: <?php echo $row['Address'] . ", " . $row['City']; ?></p>
                            <p>Phone Number: +<?php echo $row['Phone']; ?></p>
                        </td>
                        <td>
                            <form action="HotelDetail.php" method="get"><input id="hotelId" type="hidden" name="hotelId"
                                                                               value=<?php echo $row['ID'] ?>> <input
                                        type="submit" value="Details"></form>
                        </td>
                    </tr>
                    <?php
                }
                echo "</table><br>";

                $prev = http_build_query(array_merge($_GET, array("page" => $page - 1)));
                $next = http_build_query(array_merge($_GET, array("page" => $page + 1)));

                if ($page > 0) {
                    echo "<span style=\"float:left;\"><a href='HotelResult.php?{$prev}'>Previous Page</a></span>";
                }

                if (($page + 1) * $lim < $numRows) {
                    echo "<span style=\"float:right;\"><a href='HotelResult.php?{$next}'>Next Page</a></span>";
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
