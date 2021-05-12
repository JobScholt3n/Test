<?php
require_once('functions.class.php');
$object = new Functions();

?>
<table>
    <form method="post">
        <a href="index.php">Terug</a>
        <h1>Toevoegen</h1>
        <tr>
            <td><b>Serie of Film</b></td>
            <td>
                <select name="SerieOfFilm">
                    <option name="Serie" value="Serie">Serie</option>
                    <option name="Film" value="Film">Film</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Title</b>
            </td>
            <td> <input type="text" id="Title" name="Title"></input>
            </td>
        </tr>
        <tr>
            <td>
                <b>Rating </b>
            </td>
            <td> <input type="text" id="Rating" name="Rating"></input>
            </td>
        </tr>
        <tr>
            <td><b>Seasons</b></td>
            <td> <input type="text" id="Seasons" name="Seasons"></input></td>
        </tr>
        <tr>
            <td>
                <b>Country</b>
            </td>
            <td> <input type="text" id="Country" name="Country"></input>
            </td>
        </tr>
        <tr>
            <td>
                <b>Language</b>
            </td>
            <td><input type="text" id="Language" name="Language"></input></td>
        </tr>
        <tr>
            <td>
                <b>Omschrijving</b>
            </td>
            <td><textarea rows="10" cols="70" id="Description" name="Description"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Toevoegen"></input></td>
        </tr>
    </form>
</table>
<?php



if (isset($_POST['submit'])) {
    $object->add();
    echo "Toegevoegd";
};
