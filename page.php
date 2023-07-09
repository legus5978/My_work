<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: auth.php');
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
<div>
    <h1 style="color: firebrick">WELLCOME</h1>
    <form class="page">
        <h2 style="margin: 10px 0"><?= $_SESSION['user']['name']?> <?=$_SESSION['user']['surname']?></h2>
        <a href=""><?=$_SESSION['user']['email']?></a>
        <p>0<?=$_SESSION['user']['phone-number']?></p>
        <p> <?=$_SESSION['status']?></p>
        <a href="logout.php" class="logout">Вийти</a>
    </form>
</div>
</body>
</html>