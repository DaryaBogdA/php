<?php
header('Content-Type: application/json');

require "db_23.php";

$year  = (int)$_POST['year'];
$month = (int)$_POST['month'];
$day   = (int)$_POST['day'];
if (!$year || !$month || !$day){
    echo json_encode(["status" => "error"]);
}
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
