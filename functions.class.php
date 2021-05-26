<?php
require_once('database.class.php');
session_start();
class Functions extends Database
{

    public function getSeries($order)
    {
        $sql = ("SELECT * FROM media WHERE serie = 1 ORDER BY $order");
        $stmt = $this->connect()->query($sql);
        foreach ($stmt as $serierow) {
            echo '<tr>';
            echo '<td style=width: 200px>', $serierow['title'] . '</td>';
            echo '<td>', $serierow['rating'] . '</td>';
            echo '<td><a href="media.php?id=' . $serierow['id'] . '">Bekijk Details</a></td>';
            echo '</tr>';
        }
        $stmt->execute();
    }

    public function getMovies($order)
    {
        $sql = ("SELECT * FROM media WHERE serie = 0 ORDER BY $order");
        $stmt = $this->connect()->query($sql);
        foreach ($stmt as $movierow) {
            echo '<tr>';
            echo '<td>', $movierow['title'] . '</td>';
            echo '<td>', $movierow['rating'] . '</td>';
            echo '<td><a href="media.php?id=' . $movierow['id'] . '">Bekijk Details</a></td>';
            echo '</tr>';
        }
        $stmt->execute();
    }

    public function seriesUrl()
    {
        $films      = isset($_GET['films']) && !empty($_GET['films'])    ? 'films=' . $_GET['films'] . '&'       : '';
        echo $films;
    }

    public function moviesUrl()
    {
        $series     = isset($_GET['series']) && !empty($_GET['series'])  ? 'series=' . $_GET['series'] . '&'     : '';
        echo $series;
    }

    public function update()
    {
        $sql = $this->connect()->prepare("UPDATE `media` SET 
        `title` = :title, 
        `rating` = :rating, 
        `seasons` = :seasons, 
        `country` = :country, 
        `language` = :language,
        `description` = :description
       
        WHERE `id` = :id");

        $sql->bindParam(':id', $_GET['id']);
        $sql->bindParam(':title', $_POST['Title']);
        $sql->bindParam(':rating', $_POST['Rating']);
        $sql->bindParam(':seasons', $_POST['Seasons']);
        $sql->bindParam(':country', $_POST['Country']);
        $sql->bindParam(':language', $_POST['Language']);
        $sql->bindParam(':description', $_POST['Description']);

        $sql->execute();
    }

    public function add()
    {
        $sql = $this->connect()->prepare("INSERT INTO `media`(id,serie, title, rating, seasons, country, language, description) VALUES(
         NULL,
        :serie,
        :title, 
        :rating,  
        :seasons, 
        :country, 
        :lang,
        :descr
        )");

        if ($_POST['SerieOfFilm'] == "Serie") {
            $sql->bindValue(':serie', 1, PDO::PARAM_INT);
        } else if ($_POST['SerieOfFilm'] == "Film") {
            $sql->bindValue(':serie', 0, PDO::PARAM_INT);
        }
        $sql->bindParam(':title', $_POST['Title']);
        $sql->bindParam(':rating', $_POST['Rating']);
        $sql->bindParam(':seasons', $_POST['Seasons']);
        $sql->bindParam(':country', $_POST['Country']);
        $sql->bindParam(':lang', $_POST['Language']);
        $sql->bindParam(':descr', $_POST['Description']);
        $sql->execute();
    }

    public function login($username, $password)
    {

        $sql = $this->connect()->prepare("SELECT * FROM gebruikers WHERE username = :username AND wachtwoord = :password");

        $sql->bindParam(':username', $username);
        $sql->bindParam(':password', $password);
        $sql->execute();
        $count = $sql->rowCount();
        $row   = $sql->fetch(PDO::FETCH_ASSOC);
        if ($count == 1 && !empty($row)) {
            $_SESSION['loggedInUser'] = $row['id'];
            header("Location: ../");
            exit();
        } else {
            echo "Invalide gebruikersnaam/wachtwoord combinatie";
        }
    }
}
