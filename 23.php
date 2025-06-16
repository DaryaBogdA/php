<?php
$mysqli = new mysqli('MySQL-8.2', 'root', '', 'week_23');
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $year = trim(filter_var($_GET['year'], FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($year)) {
        $stmt = $mysqli->prepare("SELECT day, month, year FROM days WHERE year = ?");
        $stmt->bind_param("i", $year);
        $stmt->execute();
        $result = $stmt->get_result();

        $dates = [];

        while ($row = $result->fetch_assoc()) {
            $dates[] = [
                "day" => (int)$row['day'],
                "month" => (int)$row['month'],
                "year" => (int)$row['year']
            ];
        }

        echo json_encode($dates, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(["error" => "Год не указан"]);
    }
}
