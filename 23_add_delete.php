<?php
header('Content-Type: application/json');

require "db_23.php";

$year  = isset($_GET['year'])  ? (int)$_GET['year']  : 0;
$month = isset($_GET['month']) ? (int)$_GET['month'] : 0;
$day   = isset($_GET['day'])   ? (int)$_GET['day']   : 0;

$stmt = $mysqli->prepare("SELECT id FROM days WHERE year = ? AND month = ? AND day = ?");
$stmt->bind_param("iii", $year, $month, $day);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $delete = $mysqli->prepare("DELETE FROM days WHERE year = ? AND month = ? AND day = ?");
    $delete->bind_param("iii", $year, $month, $day);
    $delete->execute();
    echo json_encode(["status" => "success", "color" => false]);
} else {
    $insert = $mysqli->prepare("INSERT INTO days(day, month, year) VALUES (?, ?, ?)");
    $insert->bind_param("iii", $day, $month, $year);
    $insert->execute();
    echo json_encode(["status" => "success", "color" => true]);
}
