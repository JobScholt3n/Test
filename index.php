<?php
require_once('functions.class.php');
$functie = new Functions();
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit();
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series en movies wijzigen</title>
    <style>
        #logout {
            color: red;
            float: right;
            margin-top: -70px;
            font-style: italic;
            text-decoration: underline;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <h1>Welkom op het netland beheerderspaneel</h1>
    <form action="logout.php" method="POST">
        <input type="submit" id="logout" name="logout" value="Logout">
    </form>

    <h2>Series</h2>

    <table>
        <th>
            <h4><b><a href="index.php?<?php $functie->seriesUrl(); ?>series=title">Titel</a></b></h4>
        </th>
        <th>
            <h4><b><a href="index.php?<?php $functie->seriesUrl(); ?>series=rating">Rating</a></b></h4>
        </th>

        <?php
        if (isset($_GET['series'])) {
            if ($_GET['series'] == "title") {
                $get_series = isset($_GET['series']) && !empty($_GET['series']) ? $_GET['series'] : 'id';
                echo $functie->getSeries($get_series);
            }
            if ($_GET['series'] == "rating") {
                $get_series = isset($_GET['series']) && !empty($_GET['series']) ? $_GET['series'] : 'id';
                echo $functie->getSeries($get_series);
            }
        } else {
            $functie->getSeries('id');
        }
        ?>

    </table>

    <h2>Films</h2>
    <table>
        <th>
            <h4><b><a href="index.php?<?php $functie->moviesUrl(); ?>films=title">Titel</a></b></h4>
        </th>
        <th>
            <h4><b><a href="index.php?<?php $functie->moviesUrl(); ?>films=rating">Rating</a></b></h4>
        </th>

        <?php
        if (isset($_GET['films'])) {
            if ($_GET['films'] == "title") {
                $get_films = isset($_GET['films']) && !empty($_GET['films']) ? $_GET['films'] : 'id';
                $functie->getMovies($get_films);
            }
            if ($_GET['films'] == "rating") {
                $get_films = isset($_GET['films']) && !empty($_GET['films']) ? $_GET['films'] : 'id';
                $functie->getMovies($get_films);
            }
        } else {
            $functie->getMovies('id');
        }
        ?>
        <tr>
            <td><a href="insert.php">Serie of film toevoegen</a></td>
        </tr>
        <tr>
            <td><a href="admin.php">Admin</a></td>
        </tr>

    </table>

</body>

</html>