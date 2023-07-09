<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<?php session_start();
if (isset($_SESSION['user'])){
    header('Location: page.php');
}
?>

<div class="form-container">
    <h2>Форма реєстрації</h2>
    <form action="check.php" method="post">
        <div class="form-group">
            <label for="name">Ім'я:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Прізвище:</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login" value="<?php if (isset($_POST['login'])){ echo $_POST['login'];} ?>">

        </div>
        <div class="form-group">
            <label for="phone_number">Номер телефону:</label>
            <input type="text" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])){ echo $_POST['email'];}?>" >
        </div>
        <div class="form-group">
            <label for="birthday">Дата народження:</label>
            <input type="date" id="birthday" name="birthday" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" value="<?php if (isset($_POST['password'])){ echo $_POST['password'];} ?>">
        </div>
        <div class="form-group">
            <lable>Введіть пароль ще раз:</lable>
            <input type="password" name="confirm" value="">
        </div>
        <input type="submit" value="Зареєструватися">

    </form>
    <p> У вас вже є акаунт? <a href="auth.php">Увійти</a></p>
    <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">'.$_SESSION['message'].'</p>';
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['pas_confirm'])){
        echo '<p class="msg">'.$_SESSION['pas_confirm'].'</p>';
        unset($_SESSION['pas_confirm']);
        }
        if (isset($_SESSION['err_email'])){
            echo '<p class="msg">'.$_SESSION['err_email'].'</p>';
            unset($_SESSION['err_email']);
        }
        if (isset($_SESSION['err_pas'])){
            echo '<p class="msg">'.$_SESSION['err_pas'].'</p>';
            unset($_SESSION['err_pas']);
        }
        if (isset($_SESSION['err_log'])){
            echo '<p class="msg">'.$_SESSION['err_log'].'</p>';
            unset($_SESSION['err_log']);
        }

        ?>
</div>
</body>
</html>