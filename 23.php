<?php
    header('Content-Type: application/json');
    require "db_23.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $year = get_year();

        if (!empty($year)) {
            $result = get_result_database($mysqli, $year);
            $dates = get_dates($result);
            return_dates($dates);
        } else {
            error();
        }
    }
    function get_year(){
        return trim(filter_var($_GET['year'], FILTER_SANITIZE_SPECIAL_CHARS));
    }

    function get_result_database($mysqli, $year){
        $stmt = $mysqli->prepare("SELECT day, month, year FROM days WHERE year = ?");
        $stmt->bind_param("i", $year);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_dates($result){
        $dates = [];

        while ($row = $result->fetch_assoc()) {
            $dates[] = [
                "day" => (int)$row['day'],
                "month" => (int)$row['month'],
                "year" => (int)$row['year']
            ];
        }

        return $dates;
    }

    function return_dates($dates){
        echo json_encode(["status" => "success", "dates" => $dates], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function error(){
        echo json_encode(["status" => "error"]);
    }

