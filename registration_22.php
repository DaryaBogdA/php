<?php
    require "bd_22.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
        $lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
        $phone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS));
        $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password_reset = trim(filter_var($_POST['password_reset'], FILTER_SANITIZE_SPECIAL_CHARS));

        if(empty($name) || empty($lastname) || empty($email) || empty($phone) || empty($login) || empty($password_reset) || empty($password)){
            echo json_encode(["status" => "error", "message" => "Заполните пожалуйста все поля"]);
            exit;
        }

        if(strlen($name) < 3 || strlen($lastname) < 3 || strlen($name) > 33 || strlen($lastname) > 53){
            echo json_encode(["status" => "error", "message" => "В фамилии и имени должно быть больше символов"]);
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["status" => "error", "message" => "Неверная электронная почта"]);
            exit;
        }
        if (!preg_match('/^\+375\d{9}$/', $phone)) {
            echo json_encode(["status" => "error", "message" => "Неверный номер телефона"]);
            exit;
        }

        if($password != $password_reset){
            echo json_encode(["status" => "error", "message" => "Пароли не совпадают"]);
            exit;
        }

        $mysqli = $config['mysqli'];
        $stmt = $mysqli->prepare("INSERT INTO users (name, lastname, email, phone, login, password) VALUES (?, ?, ?, ?, ?, ?)");
        $password = md5($config['salt'].$password);
        $stmt->bind_param("ssssss", $name, $lastname, $email, $phone, $login, $password);

        if($stmt->execute()){
            echo json_encode(["status" => "success", "message" => "Регистрация успешна"]);
        }
        else {
            echo json_encode(["status" => "error", "message" => "Запрос не был выполнен"]);
        }

    }










// $stmt->execute(); добавфить if на почт