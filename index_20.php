<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $n = $_POST["number"];

        if (!is_numeric($n) || $n <= 0) {
            echo "<p>Введите число</p>";
        } else {
            echo "<form method='post'>";
            for ($i = 1; $i <= $n; $i++) {
                echo "<input type='text' name='input_$i' placeholder='input_$i'><br>";
            }
            echo "</form>";
        }
    }
?>

<form method="post">
    <label>Введите число:</label>
    <input type="text" name="number">
    <input type="submit" value="Создать">
</form>
