<?php
session_start();

if (!empty($_POST['password']) and !empty($_POST['login'] and !empty($_POST['confirm']))){
    $log = preg_match('#\w{5,30}#', $_POST['login']);
    $pas = preg_match('#\w{5,100}#', $_POST['password']);
    $email = preg_match('#[a-z0-9_-]+@[a-z0-9]+\.[a-z0-9]{2,}#', $_POST['email']);
    if ($log) {
        if ($pas) {
            if ($email) {
                if ($_POST['password'] === $_POST['confirm']) {
                    $names = $_POST['name'];
                    $surname = $_POST['surname'];
                    $login = $_POST['login'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $confirm = $_POST['confirm'];
                    $phone = $_POST['phone_number'];
                    $email = $_POST['email'];
                    $birth = $_POST['birthday'];


                    $host = 'localhost';
                    $user = 'root';
                    $pass = 'root';
                    $name = 'register-bd';
                    $link = mysqli_connect($host, $user, $pass, $name);
                    mysqli_query($link, "SET NAMES 'utf8'");

                    $query = "SELECT * FROM users WHERE login = '$login'";
                    $user = mysqli_fetch_assoc(mysqli_query($link, $query));

                    if (empty($user)) {
                        $query = "INSERT INTO users SET name = '$names', surname = '$surname', login = '$login', password = '$password', phone_number = '$phone', email = '$email', birthday = '$birth', id_status = '2', `regis_date` = CURRENT_DATE";
                        $result = mysqli_query($link, $query);
                        $_SESSION['auth'] = true;
                        $id = mysqli_insert_id($link);
                        $_SESSION['id'] = $id;
                        $_SESSION['successfully']="Вітаю, $names ви успішно зареєстровані!";
                        header('Location: auth.php');
                    } else {
                        $_SESSION['message']='Такий логін вже існує!';
                        header('Location: register.php');
                    }
                } else {
                    $_SESSION['pas_confirm']='Паролі не співпадають!';
                    header('Location: register.php');
                }
            } else {
                 $_SESSION['err_email'] = 'Email не коректний';
                 header('Location: register.php');
            }
        } else {
            $_SESSION['err_pas'] = 'Пароль введений не коректно!';
            header('Location: register.php');
        }
    } else {
        $_SESSION['err_log'] = 'Логін введений не коректно!';
        header('Location: register.php');

    }
}
?>