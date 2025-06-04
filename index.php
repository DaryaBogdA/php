<?php
//1
$employees = [
    ["name" => "Иванов", "phone" => "111-22-33", "email" => "ivanov@domain.com"],
    ["name" => "Петров", "phone" => "112-24-36", "email" => "petrov@domain.com"],
    ["name" => "Сидоров", "phone" => "113-25-37", "email" => "sidorov@domain.com"]
];
//2
$arr = [1, 2, "A", 3.764, 34, "B", 12];

for ($i = 0; $i < count($arr); $i++) {
    if (ctype_alpha($arr[$i])) {
        unset($arr[$i]);
    }
}
foreach ($arr as $a) {
    echo $a . '<br>';
}
//3
$n = 5;

echo "<form>";
for ($i = 1; $i <= $n; $i++) {
    echo "<input type='text' name='form_$i' placeholder='$i'><br>";
}
echo "</form>";
//4
$m = 5;
echo "<table>";
for ($i = 1; $i <= $n; $i++) {
    echo "<tr style=\"border: 1px solid black;\">";
    for ($j = 1; $j <= $m; $j++) {
        echo "<td style=\"border: 1px solid black;\"> Строка $i Столбец $j </td>";
    }
    echo "</tr>";
}
echo "</table>";
//5
function sort_arr($arr)
{
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            sort($value);
            $arr[$key] = $value;
        }
    }

    if (array_keys($arr) === range(0, count($arr) - 1)) {
        sort($arr);
    } else {
        asort($arr);
    }
    ksort($arr);
    return $arr;
}

$data = [
    3 => [8, 2, 5],
    1 => [7, 3, 1],
    2 => 9,
    0 => [6, 4]
];

$data = sort_arr($data);

foreach ($data as $key => $value) {
    if (is_array($value)) {
        echo "Ключ $key: " . implode(", ", $value) . "<br>";
    } else {
        echo "Ключ $key: $value <br>";
    }
}

//6
$row = 1000;
$column = 3;
$r = 0x0;
$g = 0x0;
$b = 0x0;
$color_r = 0x0;
$color_g = 0x0;
$color_b = 0x0;
echo "<table>";
for ($i = 1; $i <= $row; $i++) {
    echo "<tr style=\"border: 1px solid black;\">";
    for ($j = 1; $j <= $column; $j++) {
        $color_r += $r + 0x1;
        $color_g += $g + 0x1;
        $color_b += $b + 0x1;
        $color = '#' . $color_r . $color_g . $color_b;
        echo "<td style=\"border: 1px solid black; background-color: $color \"> Строка $i Столбец $j </td>";
    }
    echo "</tr>";
}
echo "</table>";








