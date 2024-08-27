<?php
session_start();
$usersFile = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    file_put_contents($usersFile, $username . ':' . $password . PHP_EOL, FILE_APPEND);
    header('Location: login.php');
    exit();
}
?>
