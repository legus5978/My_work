<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $name = 'register-bd';
    $connect = mysqli_connect($host,$user,$pass,$name);
    mysqli_query($connect,"SET NAMES 'utf8'");
    if (!$connect){
        die('Error connect to DataBase');
    }
?>