<?php
$conn = new mysqli('MySQL-8.2', 'root', '', 'table');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cellId = $_POST['cell_id'];

    if ($cellId) {
        $request = $conn->prepare("SELECT type FROM cells WHERE name = ?");
        $request->bind_param("s", $cellId);
        $request->execute();
        $result = $request->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['type']) {
                $sql = "UPDATE cells SET type = false WHERE name = ?";
            } else {
                $sql = "UPDATE cells SET type = true WHERE name = ?";
            }

            $update_request = $conn->prepare($sql);
            $update_request->bind_param("s", $cellId);
            $update_request->execute();
        }
    }
}

$conn->close();
?>
