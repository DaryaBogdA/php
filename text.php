<?php
$text = file_get_contents("text.txt");

$arr_text = explode(" ", $text);

for($i= 0;$i<count($arr_text);$i++){
    $mess .= $arr_text[$i] . "\n";
}
$file = fopen('new_text.txt', 'w');

fwrite($file, $mess);

if(file_exists('new_text.txt')){
    echo 'Готовj';
}