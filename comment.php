<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
        $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_SPECIAL_CHARS));

        if (!empty($name) && !empty($comment)) {
            $mysqli = new mysqli('MySQL-8.2', 'root', '', 'comment');

            $stmt = $mysqli->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $comment);
            $stmt->execute();
            header("Location: 22.php");
            exit;
        }
    }
?>