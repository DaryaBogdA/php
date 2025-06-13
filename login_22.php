<?php
require "bd_22.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if(empty($login) || empty($password)){
        echo json_encode(["status" => "error", "message" => "Заполните пожалуйста все поля"]);
        exit;
    }
    $mysqli = $config['mysqli'];
    $stmt = $mysqli->prepare("SELECT login, password FROM users WHERE login = ? AND password = ?");
    $password = md5($config['salt'].$password);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Привет, ". $login]);
    } else {
        echo json_encode(["status" => "error", "message" => "Неверный логин или пароль"]);
    }
}
