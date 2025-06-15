<?php
session_start();
$name = $_POST['username'];
$email = $_POST['email'];

if (strlen($name) <= 1 || strlen($email) <= 5) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    echo "У вас есть ошибка. <a href='11_14.php'>Home</a>";
    exit();
}

session_destroy();
setcookie('user', $email, time() + 3600);
header('Location: 11_14.php');
