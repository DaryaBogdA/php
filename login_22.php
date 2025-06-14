<?php
$mysqli = new mysqli('MySQL-8.2', 'root', '', 'week_22');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if(empty($login) || empty($password)){
        echo json_encode(["status" => "error", "message" => "Заполните пожалуйста все поля"]);
        exit;
    }
    $stmt = $mysqli->prepare("SELECT login, password FROM users WHERE login = ? AND password = ?");
    $salt = 'n;fa43p9n8b2-83460243mv098=9;fkdjSDG';
    $password = md5($salt.$password);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();

    echo json_encode(["status" => "success", "message" => "Привет $login"]);
    exit;
}
