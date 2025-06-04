<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["login"] === "admin" && $_POST["password"] === "1234") {
        $_SESSION["user"] = $_POST["login"];
    } else {
        echo "Ошибка: Неверный логин или пароль!";
    }
}

if (isset($_SESSION["user"])) {
    echo "Здравствуйте, " . $_SESSION["user"] . "!";
}

?>

<form method="post">
    Логин: <input type="text" name="login"><br>
    Пароль: <input type="password" name="password"><br>
    <button type="submit">Войти</button>
</form>