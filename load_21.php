<?php
$conn = new mysqli('MySQL-8.2', 'root', '', 'table');

$result = $conn->query("SELECT name, type FROM cells ORDER BY name");

$cells = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $cells[$row['name']] = $row['type'];
    }
}

echo "<table id='table'>";
$rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
foreach ($rows as $row) {
    echo "<tr>";
    for ($i = 1; $i <= 8; $i++) {
        $cell_name = $row . $i;
        $color = isset($cells[$cell_name]) && $cells[$cell_name] ? 'red' : 'white';
        echo "<td id='$cell_name' style='background-color: $color;'>$cell_name</td>";
    }
    echo "</tr>";
}
echo "</table>";

$conn->close();

