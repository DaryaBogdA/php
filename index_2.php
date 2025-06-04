<?php
$conn = mysqli_connect("MySQL-8.2", "root", "", "abiturient");

// Проверяем подключение
if (!$conn) {
die("Ошибка подключения: " . mysqli_connect_error());
}

echo "Подключение успешно!";

// Находим количество рядов, затронутых последним select
$str = 'Select * from teachers';
$result = mysqli_query($conn, $str);
$kol = mysqli_num_rows($result);
echo $kol;
echo "<br />";

// Демонстрация функции mysql_fetch_array
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
print_r($row);
}
echo "<br />";

$str = 'Select * from teachers where id = 9';
$result = mysqli_query($conn, $str);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
print_r($row);
}
echo "<br />";

// Демонстрация функции mysql_fetch_array
$str = 'Select id,name,lastname from teachers';
$result = mysqli_query($conn, $str);
$key  = array();
$j = 0;
while ($row = mysqli_fetch_object($result))
{
$key[$j][]=$row->id;
$key[$j][]=$row->name;
$key[$j][]=$row->lastname;
$j++;
}
echo "<br />";
print_r($key);
echo "<br />";

$str = 'Select * from `groups`';
$result = mysqli_query($conn, $str);
$name = array();
$res = array();
$count_fields = mysqli_num_fields($result);
for ($i = 0; $i < $count_fields; $i++)
{
$meta = mysqli_fetch_field($result);
$name[] = $meta->name;
}
for ($i = 0,$count = mysqli_num_rows($result); $i < $count; $i++)
{
if (!mysqli_fetch_object($result))
{
echo "Cannot seek to row $i: " . mysqli_error($conn);
continue;
}
$row = mysqli_fetch_object($result);
for ($j=0; $j<$count_fields; $j++)
{
$res[$i][$name[$j]] = $row->$name[$j];
}
}
print_r($res);

echo "<br />";
// Демонстрация функции mysql_result
$str = 'Select id,name,lastname from teachers order by id';
$result = mysqli_query($conn, $str);
$row = mysqli_fetch_row($result);
if ($row) {
echo $row[1];
}

mysqli_free_result($result);
mysqli_close($conn);

//$res = db::select($str);
//debug::show($res);
