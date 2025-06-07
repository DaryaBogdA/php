
<?php
    $title = 'Главная';
    require "block/header.php";

?>
<h1>Главная страница</h1>
<?php
////14
//   $lis = [5,7,3,4,8,3,5];
//   unset($lis[1]);
//   $lis = array_values($lis);
//   sort($lis);
//   shuffle($lis);
//
//   echo in_array(3, $lis);
//   print_r($lis);
//
//   $arr = array_slice($lis, 2, 2);
//    var_dump($arr); //подробнее
//
//
//    $arr_1 = [3,5];
//    $arr_2 = [1,4,5];
//    $arr_3 = array_merge($arr_1, $arr_2);
//
//
//    $x = 19;
//    echo gettype($x);
//    echo is_numeric($x); //даже если в строке число
//    echo is_integer($x);
//    echo is_double($x);
//    echo is_array($x);
//    echo is_string($x);
//
//    $str = "asdg;asdlgk";
//    echo strpos($str, 'as');
//    strlen($str);
//    substr($str, 4, 9);
//    strtolower($str);
//    trim($str);
//    $words = "asdf,grgwaer,agshre,qewte";
//    $arr_words = explode(",", $words);
//    echo implode("^", $arr_words);
//
//    require "block/footer.php";
//?>
<!--15-->
<!--    <form action="write.php" method="post">-->
<!--        <textarea name="message"></textarea><br>-->
<!--        <input type="submit" placeholder="Send">-->
<!--    </form>-->
<!--    --><?php
//    $file = fopen('text/data.txt', 'r');
//    echo fread($file, 10);
//    fclose($file);
//    echo file_get_contents('text/data.txt');
//    file_put_contents('text/data.txt', "$file\nasdgasdg");
//    //file_put_contents('text/data.txt', 'asdgasdg');
//
//    file_exists('text/data.txt');
//    file_size('text/data.txt');
//    rename('text/data.txt','text/new_data.txt');
//    unlink('text/data.txt');

        //16
    date_default_timezone_set('Europe/Minsk');
    $date = date('Время: H:i:s');
    echo $date;

    $date_now = new DateTime();
    $date_now->modify('+1 hour');
    echo $date_now->format('Время: H:i:s');
//     abs();
//     round();
//     ceil();//в большую
//     floor();//в меньшую
//    mt_rand(1,35);
//    min();
//    max();
//    sin();
//    cos();
//    tan();
    echo $_SERVER['SERVER_NAME'];