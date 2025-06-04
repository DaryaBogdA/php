
<?php
    $conn = mysqli_connect("MySQL-8.2", "root", "", "bog");

    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    function get_news($conn, $n) {
        $str = "SELECT `date`, title, text FROM news ORDER BY `date` DESC LIMIT $n";
        $result = mysqli_query($conn, $str);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>Дата: " . $row['date'] . "</p>";
            echo "<p>" . $row['text'] . "</p>";
            echo "------------------------------------------------------------------------------------------------------------------------------------------------------";
        }
    }

    function menu($conn, $parent_id){
        if ($parent_id === NULL) {
            $str = "SELECT id, text FROM pages WHERE parent_id IS NULL";
        } else {
            $str = "SELECT id, text FROM pages WHERE parent_id = $parent_id";
        }
        $result = mysqli_query($conn, $str);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<li>" . $row['text'];
                menu($conn, $row["id"]);
                echo "</li>";
            }
        }
    }

    get_news($conn, 5);
    menu($conn, NULL);
?>