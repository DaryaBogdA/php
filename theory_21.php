<?php
    count($arr)
    in_array(2, $arr)
    array_merge($arr, $arr_2);
    array_slice($arr_merge, 0, 3);
    sort($arr);
    shuffle($arr);

    date_default_timezone_set('Europe/Minsk');
    date('Время - H:i:s', time() + 3600 * 5);
    $date_now = new DateTime();
  $date_now->modify('+5 week');
  echo $date_now->format('Время - H:i:s');
    abs
    mt_rand
    min
    sin

    strlen($str) . '<br>';
    strpos($str, "sfdg")
    substr
    trim
gettype
is_array
is_bool
is_string
is_double
is_integer
is_numeric