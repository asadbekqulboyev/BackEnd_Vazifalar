<?php

session_start();

// Har bir kirishda foydalaniladigan login va parol
$valid_username = 'user';
$valid_password = 'password';

// Login jarayoni
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Login va parolni tekshirish
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        header("Location: vazifa9.php");
        exit();
    } else {
        $error = "Login yoki parol xato!";
    }
}

// Logout jarayoni
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: vazifa9.php");
    exit();
}

// Foydalanuvchi login qilganini tekshirish
function isLoggedIn()
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

// Xabarni qo'shish funksiyasi
function addMessage($user_name, $message, $imgAvatar)
{
    $time = date("H:i:s");
    $timestamp = time();
    $log = "$imgAvatar | $user_name | $time | $timestamp | $message" . PHP_EOL;
    file_put_contents('base.txt', $log, FILE_APPEND);
}

// Xabarni o'chirish funksiyasi
function deleteMessage($lineNumber)
{
    $lines = file('base.txt');
    if (isset($lines[$lineNumber])) {
        unset($lines[$lineNumber]);
        file_put_contents('base.txt', implode('', $lines));
    }
}

// Xabarlarni o'qish funksiyasi
function getMessages()
{
    return file_exists('base.txt') ? file('base.txt') : [];
}

// Fayl yuklash funksiyasi
function uploadAvatar($file)
{
    $target_dir = "images/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Faylning haqiqiy rasm ekanligini tekshirish
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        echo "Fayl rasm emas.";
        return false;
    }

    // Fayl turi cheklovlari
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Faqat JPG, JPEG, PNG va GIF fayllar ruxsat etilgan.";
        return false;
    }

    // Fayl yuklash
    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        echo "Faylni yuklashda xatolik yuz berdi.";
        return false;
    }

    return $target_file;
}

// Xabarni qo'shish jarayoni
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message']) && isLoggedIn()) {
    $imgAvatar = uploadAvatar($_FILES["imgAvatar"]);
    if ($imgAvatar) {
        $user_name = htmlspecialchars($_POST['user_name']);
        $message = htmlspecialchars($_POST['message']);
        addMessage($user_name, $message, $imgAvatar);
    }

    header("Location: vazifa9.php");
    exit();
}

// Xabarni o'chirish jarayoni
if (isset($_GET['delete']) && isLoggedIn()) {
    $lineNumber = intval($_GET['delete']);
    deleteMessage($lineNumber);
    header("Location: vazifa9.php");
    exit();
}

// Barcha xabarlarni olish
$chats = getMessages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background:url('https://img.freepik.com/free-vector/vector-social-contact-seamless-pattern-white-blue_1284-41919.jpg');
    }
    .chat-box{
        height: 270px; 
        overflow-y: auto;
        border-radius:8px;
        background:#ffffffc8;
        backdrop-filter:blur(2px);
    }
    .chat-box::-webkit-scrollbar {
        width: 4px;
        border-radius:12px;
         background:#fff;
    }
    .chat-box::-webkit-scrollbar-thumb{
        background: #66d9ff;
       
    }
    .message{
        background:#c4dfff;
        border-radius:8px;
        padding:8px;
        margin-top: 5px;
        margin-bottom:5px;
    }
    .delete svg path{
        transition:all .2s linear;

    }
    .delete svg{
        cursor:pointer;
    }
    .delete svg:hover path{
        fill:red;
    }
    .chat_bg{
        background:#ffffffc5;
        backdrop-filter:blur(2px);
        padding:10px;
        border-radius:12px;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row">
              <?php if (isLoggedIn()): ?>
            <div class="col-md-6 offset-md-3 chat_bg">
                <h3 class="text-center">Chat</h3>
                <div id="chat-box" class="chat-box border p-3 mb-3">
                    
                    <?php  foreach ($chats as $index => $chat): ?>
                        <div class="chat-message border-bottom mb-2 pb-2 d-flex align-items-start">
                            <?php list($imgAvatar, $user_name, $time, $timestamp, $message) = explode('|', $chat); ?>
                            <img src="<?= trim($imgAvatar) ?>" alt=<?= trim($user_name) ?> class="rounded-circle me-2" width="40" height="40">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                   <strong><?= trim($user_name) ?></strong> <span class="text-muted"> <?= trim($time) ?> </span> 
                                </div>
                                <p class="message"><?= trim($message) ?>
                              
                            </p>
                            <div class='d-flex justify-content-end delete' onclick="deleteMessage(<?= $index ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                                <linearGradient id="nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1" x1="18.405" x2="33.814" y1="10.91" y2="43.484" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#32bdef"></stop><stop offset="1" stop-color="#1ea2e4"></stop></linearGradient><path fill="url(#nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1)" d="M39,10l-2.835,31.181C36.072,42.211,35.208,43,34.174,43H13.826	c-1.034,0-1.898-0.789-1.992-1.819L9,10H39z"></path><path fill="#0176d0" d="M32,7c0-1.105-0.895-2-2-2H18c-1.105,0-2,0.895-2,2c0,0,0,0.634,0,1h16C32,7.634,32,7,32,7z"></path><path fill="#007ad9" d="M7,9.886L7,9.886C7,9.363,7.358,8.912,7.868,8.8C10.173,8.293,16.763,7,24,7s13.827,1.293,16.132,1.8	C40.642,8.912,41,9.363,41,9.886v0C41,10.501,40.501,11,39.886,11H8.114C7.499,11,7,10.501,7,9.886z"></path>
                                </svg>
                    </div>
                            </div>  
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <form action="vazifa9.php" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="imgAvatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="imgAvatar" name="imgAvatar" required>
                    </div>
                    <div class="mb-2">
                        <label for="user_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                    <div class="mb-2">
                        <label for="message" class="form-label">Message</label>
                        <textarea type="text" class="form-control" id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const chatBox = document.getElementById('chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
        function deleteMessage(index) {
            if (confirm("Are you sure you want to delete this message?")) {
                window.location.href = `vazifa9.php?delete=${index}`;
            }
        }
    </script>
</body>
</html>