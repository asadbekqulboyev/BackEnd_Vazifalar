<?php
session_start();
$usersFile = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file($usersFile, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedUser, $storedPassword) = explode(':', $user);
        if ($username == $storedUser && password_verify($password, $storedPassword)) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }

  echo  header('Location: index.php');
}
?>