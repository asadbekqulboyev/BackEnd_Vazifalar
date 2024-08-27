<?php
session_start();

$chatFile = 'chat.txt';

if (isset($_POST['message'])) {
    $message = trim($_POST['message']);
    $username = $_SESSION['username'];
    $timestamp = date('Y-m-d H:i:s');

    if (!empty($_FILES['image']['name'])) {
        // Rasmni 'uploads' papkasiga yuklash
        $uploadDir = 'uploads/';
        $imageName = basename($_FILES['image']['name']);
        $imagePath = $uploadDir . uniqid() . '_' . $imageName;

        // Fayl yuklanganini tekshirish
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $image = 'Image: ' . $imagePath;
        } else {
            $image = 'Image: default-avatar.png';
        }
    } else {
        $image = 'Image: default-avatar.png';
    }

    // Xabarni yozish
    $line = $username . '|' . $message . '|' . $image . '|' . $timestamp . "\n";
    file_put_contents($chatFile, $line, FILE_APPEND);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_index'])) {
    $deleteIndex = (int)$_POST['delete_index'];

    // Fayl satrlarini olish
    $lines = file($chatFile);
    if (isset($lines[$deleteIndex])) {
        unset($lines[$deleteIndex]);
        file_put_contents($chatFile, implode('', $lines));
    }

    header('Location: index.php');
    exit();
}
?>
