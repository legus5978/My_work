<?php session_start();
if (isset($_SESSION['user'])){
    header('Location: page.php');
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизація</title>
    <link rel="stylesheet" href="CSS/styles_auth.css">
</head>
<body>
<div class="form-container">
    <h2>Форма авторизації</h2>
    <form action="check_auth.php" method="post">
        <div class="form-group">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" value="Увійти">
    </form>
    <p>У вас немає акаунта <a href="register.php">Зареєструватись</a></p>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="msg">'.$_SESSION['message'].'</p>';
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['message'])) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['message'])) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    }

    ?>
</div>
</body>
</html>