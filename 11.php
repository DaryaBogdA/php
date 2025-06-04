
<?php
    $title = 'Главная';
    require "block/header.php";
//    include
//    include_once // без повторов
?>
<h1>Главная страница</h1>
<?php
    echo date('m-l H:i:s').'<br>';
    echo date('m-l H:i:s', time() + 1000).'<br>';
    echo date('m-d H:i:s', strtotime("-1 Week -3 Day -2 Minute")).'<br>';
    echo date('m-d H:i:s', strtotime("Last Monday")).'<br>';
    require "block/footer.php";
?>