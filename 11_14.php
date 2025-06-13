<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= 'PHP' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<form action="action.php" method="post">
    <input type="text" name="username" value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name'] ?>" placeholder="Введите имя"><br>
    <input type="text" name="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?>" placeholder="Введите email"><br>
    <button type="submit">Отправить</button>
</form>
<?php
if (isset($_COOKIE['user'])) {
    echo 'Email пользователя: ' . $_COOKIE['user'] . '<br>';
}
?>
</body>

</html>