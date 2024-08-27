

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('https://img.freepik.com/free-vector/vector-social-contact-seamless-pattern-white-blue_1284-41919.jpg');
        }
        .chat {
            background: #ffffffc8;
            backdrop-filter: blur(2px);
            padding: 25px;
            border-radius: 12px;
        }
        .chat-box {
            height: 270px; 
            overflow-y: auto;
            border-radius: 8px;
            background: #ffffffc8;
            backdrop-filter: blur(2px);
            padding: 15px;
        }
        .chat-box::-webkit-scrollbar {
            width: 4px;
            border-radius: 12px;
            background: #fff;
        }
        .chat-box::-webkit-scrollbar-thumb {
            background: #66d9ff;
        }
        .message {
            background: #c4dfff;
            border-radius: 8px;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .delete svg path {
            transition: all .2s linear;
        }
        .delete svg {
            cursor: pointer;
        }
        .delete svg:hover path {
            fill: red;
        }
        .chat-bg {
            background: #ffffffc5;
            backdrop-filter: blur(2px);
            padding: 10px;
            border-radius: 12px;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .message-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 10px;
            position: relative;
        }
        .message-content {
            flex-grow: 1;
        }
        .message-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        .message-time {
            font-size: 0.8em;
            color: #888;
        }
        .delete {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        form {
            position:relative;
        }
        input[type=file] {
            width: 100%;
            position:absolute;
            background: #000;
            opacity: 0;
            visibility:hidden;
        }
        input[type=text] {
            height:50px;
            top:-45px;
        }
        .img_upload {
            position: absolute;
            top:0;
            right: 0;
            height:50%;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container chat mt-5">
    <h1 class="text-center">Chat</h1>
    <div id="chat-box" class="border p-3 chat-box">
        <?php
        $chatFile = 'chat.txt';
        if (file_exists($chatFile)) {
            $lines = file($chatFile);
            foreach ($lines as $line) {
                list($username, $message, $image, $timestamp) = explode('|', trim($line));
                echo '<div class="message-container">';
                
                if (isset($image) && strpos($image, 'Image:') !== false) {
                    $imagePath = str_replace('Image:', '', $image);
                    echo '<img src="' . htmlspecialchars($imagePath) . '" alt="image" class="profile-img">';
                } else {
                    echo '<img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" alt="Avatar" class="profile-img">'; // default avatar image
                }
                
                echo '<div class="message-content">';
                echo '<div class="message-header">';
                echo '<h5 class="mr-2">' . htmlspecialchars($username) . '</h5>';
                echo '<small class="message-time">' . htmlspecialchars($timestamp) . '</small>';
                echo '</div>';
                echo '<div class="message">' . htmlspecialchars($message) . '</div>';
                echo '</div>';
                
                // echo '<div class="delete">';
                // echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-trash" viewBox="0 0 16 16">';
                // echo '<path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 .5.5V12a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V5.5zM2 3.5V4a.5.5 0 0 0 .5.5H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a.5.5 0 0 0 .5-.5v-.5a.5.5 0 0 0-.5-.5H2.5a.5.5 0 0 0-.5.5zM3.5 2a.5.5 0 0 0-.5.5V3h10v-.5a.5.5 0 0 0-.5-.5h-9z"/>';
                // echo '</svg>';
                // echo '</div>';

                echo '</div>';
            }
        }
        ?>
    </div>

    <form action="chat_process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="message" class="form-control" placeholder="Xabar yozing" required>
        </div>
        <label class="form-group">
            <input type="file" name="image" class="form-control">
            <img class="img_upload" src="https://lh3.googleusercontent.com/_dvyz-D712wJHc6LCYhgdF-WnJ5z-JIPvvfcrHBs6stwc_gl0QFBrM4w2AhNVsQuiKI=w80" alt="">
        </label>
        <button type="submit" class="btn btn-primary">Yuborish</button>
    </form>
    <a href="logout.php" class="btn btn-danger mt-3">Chiqish</a>
</div>

<script>
    // Scroll to the bottom of the chat box
    document.getElementById('chat-box').scrollTop = document.getElementById('chat-box').scrollHeight;
</script>
</body>
</html>
