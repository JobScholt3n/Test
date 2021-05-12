<?php
require_once('functions.class.php');

if (isset($_POST['logout'])) {
    unset($_SESSION['loggedInUser']);
    if (empty($_SESSION['loggedInUser'])) {
        header("Location: login.php");
        exit();
    }
};
