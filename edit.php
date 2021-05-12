<?php
require_once('functions.class.php');

$object = new Functions();
$pdo = $object->connect();

if (isset($_GET['id'])) {
    $sql = $pdo->query("SELECT * FROM media WHERE id =" . $_GET['id']);
    $stmt = $sql->fetch();

    ?>
    <table>
        <form method="post">
            <a href="index.php">Terug</a>
            <h1><?php echo $stmt['title'], ' - ', $stmt['rating'] ?> </h1>
            <tr>
                <td>
                    <b>Title</b>
                </td>
                <td> <input type="text" id="Title" name="Title" value="<?php echo $stmt['title']; ?>"> </input>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Rating</b>
                </td>
                <td> <input type="text" id="Rating" name="Rating" value="<?php echo $stmt['rating']; ?>"> </input>
                </td>
            </tr>
            <tr>
                <td><b>Seasons</b></td>
                <td> <input type="text" id="Seasons" name="Seasons" value="<?php echo $stmt['seasons']; ?>"> </input></td>
            </tr>
            <tr>
                <td>
                    <b>Country</b>
                </td>
                <td> <input type="text" id="Country" name="Country" value="<?php echo $stmt['country']; ?>"> </input>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Language</b>
                </td>
                <td><input type="text" id="Language" name="Language" value="<?php echo $stmt['language']; ?>"> </input></td>
            </tr>
            <tr>
                <td>
                    <b>Omschrijving</b>
                </td>
                <td><textarea rows="10" cols="70" id="Description" name="Description"> <?php echo $stmt['description']; ?>
        </textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Update"></input></td>
            </tr>
        </form>
    </table>
    <?php
};
if (isset($_POST['submit'])) {
        $object->update();
        echo "Update gelukt";
};

?>