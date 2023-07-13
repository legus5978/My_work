<?php
session_start();
require_once ('connect_db.php');

if (!empty($_POST['password']) and !empty($_POST['login'] and !empty($_POST['confirm']))){
    $log = preg_match('#\w{5,30}#', $_POST['login']);
    $pas = preg_match('#\w{5,100}#', $_POST['password']);
    $email = preg_match('#[a-z0-9_-]+@[a-z0-9]+\.[a-z0-9]{2,}#', $_POST['email']);
    if (!$log) {
        $_SESSION['message'] = 'Логін введений не коректно!';
        header('Location: register.php');
        return;
    }
        if (!$pas) {
            $_SESSION['message'] = 'Пароль введений не коректно!';
            header('Location: register.php');
            return;
        }
            if (!$email) {
                $_SESSION['message'] = 'Email не коректний';
                header('Location: register.php');
                return;
            }
                if ($_POST['password'] == $_POST['confirm']) {
                    $firstName = $_POST['name'];
                    $surName = $_POST['surname'];
                    $login = $_POST['login'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $confirm = $_POST['confirm'];
                    $phone = $_POST['phone_number'];
                    $email = $_POST['email'];
                    $birth = $_POST['birthday'];

                    $query = "SELECT * FROM users WHERE login = '$login'";
                    $user = mysqli_fetch_assoc(mysqli_query($connect, $query));

                    if (empty($user)) {
                        $query = "INSERT INTO users SET name = '$firstName', surname = '$surName', login = '$login', password = '$password', phone_number = '$phone', email = '$email', birthday = '$birth', id_status = '2', `regis_date` = CURRENT_DATE";
                        $result = mysqli_query($connect, $query);
                        $_SESSION['auth'] = true;
                        $id = mysqli_insert_id($connect);
                        $_SESSION['id'] = $id;
                        $_SESSION['successfully']="Вітаю, $firstName ви успішно зареєстровані!";
                        header('Location: auth.php');
                    } else {
                        $_SESSION['message']='Такий логін вже існує!';
                        header('Location: register.php');
                    }
                } else {
                    $_SESSION['message']='Паролі не співпадають!';
                    header('Location: register.php');
                }

}
?>