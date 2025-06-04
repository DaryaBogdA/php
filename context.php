<?php
//     $a = 10;
//     $b = 5;
//     echo $a + $b . '<br>';
//     echo $a - $b . '<br>';
//     echo $a * $b . '<br>';
//     echo $a / $b . '<br>';
//     $a += 10;
//     echo $a . '<br>';
//     $b++;
//     echo $b . '<br>';
//     echo M_PI . '<br>';
//     echo M_E . '<br>';
//
//     echo abs(-4) . '<br>';
//     echo ceil(4.1) . '<br>';
//     echo floor(4.1) . '<br>';
//     echo round(4.1) . '<br>';
//     echo round(4.14563654365, 2) . '<br>';
//     echo mt_rand(1, 23) . '<br>';
//     echo min(1, 23, 34, 2, 675, 0) . '<br>';
//     echo max(1, 23, 34, 2, 675, 0) . '<br>';
//
//     $str = 'asdf'
//     echo 'hi $a' . '<br>';
//     echo "hi $a" . '<br>';
//     strlen($str);
//     trim('          dfsdf      ');
//     strtoupper()
//     strtolower()

//7
    $x = 6;
    switch($x){
        case 5:
            echo "It is 5 <br>";
            break;
        case 6:
            echo "It is 6 <br>";
            break;
        default:
            echo "What is it? <br>";
    }
//8
    $arr = array(1, 4,5, 2,6, 3,9);
    $arr[2] = 234;
    echo $arr[0] . '<br>';

    $arr_2 = ['sdfg', 4, 4.6, false];
    //асоциативный массив
    $list = ["age" => 50, "name" => "bob", "hobby" => "paint"];
    $list["name"] = "Ann";
    echo $list["name"] . '<br>';

    $matrix = [
        [1,2,3],
        [4,5,6],
        [7,8,9]
    ];
    echo $matrix[0][1] . '<br>';
//9
    for($i = 0; $i < 10; $i++){
        echo $i . '<br>';
    }
    $j = 0;

    while($j < 10){
        echo $j . '<br>';
        $j++;
    }
    $k = 0;

    do{
        echo $k . '<br>';
        $k++;
    } while($k < 10);

    foreach($list as $key => $value){
        echo "Key $key Value $value <br>";
    }

    foreach($arr as $i => $value){
        echo "Index $i Value $value <br>";
    }
//10
    function info($word){
        echo "Hello $word <br>";
    }
    function info_2($word){
        return "Hello $word <br>";
    }

    function glo(){
        global $x;
        $x = 0;
    }

    $x = 10;
    glo();
    echo $x . '<br>';

    function sta(){
        static $z;
        $z++;
        echo $z . '<br>';
    }
    sta();
    sta();
    sta();





?>