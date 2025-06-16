<?php
header('Content-Type: application/json');
require "db_23.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function get_input_date(int $year, int $month, int $day)
    {
        if (!$year || !$month || !$day) {
            echo json_encode(["status" => "error"]);
            exit;
        }
        if (!checkdate($month, $day, $year)) {
            echo json_encode(["status" => "error"]);
            exit;
        }
        return ['year' => $year, 'month' => $month, 'day' => $day];
    }
    function date_exists(mysqli $mysqli, array $date)
    {
        $stmt = $mysqli->prepare("SELECT id FROM days WHERE year = ? AND month = ? AND day = ?");
        $stmt->bind_param("iii", $date['year'], $date['month'], $date['day']);
        if (!$stmt->execute()) {
            echo json_encode(["status" => "error"]);
            exit;
        };
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    function delete_date(mysqli $mysqli, array $date)
    {
        $stmt = $mysqli->prepare("DELETE FROM days WHERE year = ? AND month = ? AND day = ?");
        $stmt->bind_param("iii", $date['year'], $date['month'], $date['day']);
        return $stmt->execute();
    }

    function insert_date(mysqli $mysqli, array $date)
    {
        $stmt = $mysqli->prepare("INSERT INTO days(day, month, year) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $date['day'], $date['month'], $date['year']);
        return $stmt->execute();
    }

    function handle_request(mysqli $mysqli)
    {
        $date = get_input_date((int)$_POST['year'],(int)$_POST['month'],(int)$_POST['day']);
        if (!$date) {
            echo json_encode(["status" => "error"]);
            exit;
        }


        if (date_exists($mysqli, $date)) {
            if (delete_date($mysqli, $date)) {
                echo json_encode(["status" => "success", "color" => false]);
            } else {
                echo json_encode(["status" => "error"]);
            }
        } else {
            if (insert_date($mysqli, $date)) {
                echo json_encode(["status" => "success", "color" => true]);
            } else {
                echo json_encode(["status" => "error"]);
            }
        }
    }

    handle_request($mysqli);
}