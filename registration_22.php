<?php
    $mysqli = new mysqli('MySQL-8.2', 'root', '', 'week_22');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
        $lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
        $phone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS));
        $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password_reset = trim(filter_var($_POST['password_reset'], FILTER_SANITIZE_SPECIAL_CHARS));

        if($password != $password_reset){
            echo json_encode(["status" => "error", "message" => "Пароли не совпадают"]);
            exit;
        }
        if(empty($name) || empty($lastname) || empty($email) || empty($phone) || empty($login) || empty($password_reset) || empty($password)){
            echo json_encode(["status" => "error", "message" => "Заполните пожалуйста все поля"]);
            exit;
        }
        if(strlen($name) < 3 || strlen($lastname) < 3){
            echo json_encode(["status" => "error", "message" => "в фамилии и имени должно быть больше символов"]);
            exit;
        }

        $stmt = $mysqli->prepare("INSERT INTO users (name, lastname, email, phone, login, password) VALUES (?, ?, ?, ?, ?, ?)");
        $salt = 'n;fa43p9n8b2-83460243mv098=9;fkdjSDG';
        $password = md5($salt.$password);
        $stmt->bind_param("ssssss", $name, $lastname, $email, $phone, $login, $password);
        $stmt->execute();

        echo json_encode(["status" => "success", "message" => "Регистрация успешна"]);
        exit;
    }