<?php
require_once('database.class.php');
$object = new Database();
$pdo = $object->connect();

if (isset($_GET['id'])) { 
        $sql = $pdo->query("SELECT * FROM media WHERE id =" . $_GET['id']);
        $stmt = $sql->fetch();
        echo '<a href="index.php">Terug</a>';
        echo '<h1>', $stmt['title'], ' - ', $stmt['rating'], '</h1>';
        echo '<b>Seasons?</b>', $stmt['seasons'], '<br>';
        echo '<b>Country?</b>', $stmt['country'], '<br>';
        echo '<b>Language?</b>', $stmt['language'], '<br> <br>';
        echo  $stmt['description'];
    ?>
        <br>
        <a href='edit.php?id=<?php echo $_GET['id'] ?>'>Gegevens Aanpassen</a>
    <?php
};
?>