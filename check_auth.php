<?php
session_start();

if (!empty($_POST['password']) and !empty($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $name = 'register-bd';
    $link = mysqli_connect($host,$user,$pass,$name);
    mysqli_query($link,"SET NAMES 'utf8'");
    $query = "SELECT users.*, statuses.name as status FROM users LEFT JOIN statuses ON users.id_status=statuses.id WHERE login = '$login'";
    $result = mysqli_query($link,$query);
    $user = mysqli_fetch_assoc($result);

    var_dump($user);


    if (!empty($user)){
        $hash = $user['password'];
        if (password_verify ($_POST['password'], $hash)){
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['status'] = $user['status'];
            $_SESSION['user'] = [
              "id"=>$user['id'],
                "name"=>$user['name'],
                "surname"=>$user['surname'],
                "login"=>$user['login'],
                "email"=>$user['email'],
                "birthday"=>$user['birthday'],
                "phone-number"=>$user['phone_number']
            ];
            header('Location: page.php');
        } else {
            $_SESSION['message']= "Пароль не підійшов!";
            header('Location: auth.php');
        }
    } else {
        $_SESSION['message']="Невірний логін або пароль!";
        header('Location: auth.php');
    }
}
?>