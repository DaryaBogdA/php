<?php
// 1
	$integer = 5;
	$string = 'asdf';
    $float = 6.5;
    $bool = true;
    echo $integer . " " . $string . " " . $float . " " . $bool;
//2
    $int = 555;
    $str = "ZZZ";

    echo $int + $str . '<br>';
    echo $int . $str . '<br>';
//3
    $first_number_3 = 12;
    $second_number_3 = 017;
    $third_number_3 = 0xB;
    $result = $first_number_3 + $second_number_3 + $third_number_3;
    echo $result . '<br>';
// 4
    $text = '235oiuyo8738dfosa4o897';
    $length = strlen($text);
    $count_number = 0;
    $count_letter = 0;
    $count_symbol = 0;
    for($i = 0; $i < $length; $i++){
        if(ctype_digit($text[$i]))
            $count_number++;
        else if(ctype_alpha($text[$i]))
            $count_letter++;
        else
            $count_symbol++;
    }
    echo "Сам текст: $text <br>
    Всего символов в тексте: $length <br>
    Цифр в текст: $count_number <br>
    Букв в тексте: $count_letter <br>
    Инные символы: $count_symbol <br>";
//5
    $four_sumbol = 'd4kb';

    if (strpos($four_sumbol, '4') !== false) {
        echo "4 есть <br>";
    } else {
        echo "4 нет <br>";
    }

    if (strpos($four_sumbol, 'b') !== false) {
        echo "b есть <br>";
    } else {
        echo "b нет <br>";
    }
//6
    $summa = 0;
    $count = 0;
    while($summa < 16){
        $first_number = mt_rand(0, 10);
        $second_number = mt_rand(0, 10);
        $third_number = mt_rand(0, 10);
        $summa = $first_number + $second_number + $third_number;
        $count++;
    }
    echo "Количество попыток: $count <br> Само число: $summa <br>";
//7
    function generate_string($length = 10) {
        $symbols = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';

        for ($i = 0; $i < $length; $i++) {
            $random_string .= $symbols[rand(0, strlen($symbols) - 1)];
        }

        return $random_string;
    }

    echo generate_string(8) . "<br>";
//8
    function decide_equation(float $a, float $b, float $c) {
        if($a == 0)
            return

        $D = $b * $b - 4 * $a * $c;

        if ($D > 0) {
            $x1 = (-$b + sqrt($D)) / (2 * $a);
            $x2 = (-$b - sqrt($D)) / (2 * $a);
            echo "Два корня: x1 = $x1, x2 = $x2";
        } else if ($D == 0) {
            $x = -$b / (2 * $a);
            echo "Один корень: x = $x";
        } else {
            echo "Нет корней";
        }
    }

    decide_equation(1, -3, 2);

?>
