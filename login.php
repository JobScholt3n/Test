<?php
require_once('functions.class.php');
$object = new Functions();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Netland Admin Panel</h1><br>

    <form method="POST">
        <table>
            <th>
            <td><input type="text" name="username" placeholder="Username"></input></td>
            </th>
            <th>
            <td><input type="password" name="password" placeholder="Wachtwoord"></input></td>
            </th>
            <th>
            <td><input type="submit" name="submit" value="Login"></input></td>
            </th>
        </table>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $object->login($_POST['username'], $_POST['password']);
};
?>