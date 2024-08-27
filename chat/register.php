<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro'yxatdan o'tish</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
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
</style>
<body>
<div class="container mt-5 chat">
    <h1>Ro'yxatdan o'tish</h1>
    <form action="process_register.php" method="post">
        <div class="form-group">
            <label for="username">Login</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Parol</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ro'yxatdan o'tish</button>
    </form>
    <p class="mt-3">Agar sizda hisob bo'lsa, <a href="login.php">kirish</a> qiling.</p>
</div>
</body>
</html>
