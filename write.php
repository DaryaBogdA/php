<?php
    if(strlen($_POST['message'])  < 5){
        header('Location^ /');
        exit;
    }

    $mess = $_POST['message'] . "\n";
    $file = fopen('text/data.txt', 'a');//w - перезапись а - дозапись

    fwrite($file, $mess);

    fclose($file);



