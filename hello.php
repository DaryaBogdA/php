<?php
$name = htmlspecialchars($_GET['name']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать</title>
</head>
<body>
<h1>Привет, <?= $name ?>!</h1>
</body>
</html>
