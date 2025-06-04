<?php
if($_GET["contry"] == 1)
    echo json_encode(array("1" => "Москва", "2" => "Санкт петербург"));
else if($_GET["contry"] == 2)
    echo json_encode(array("3" => "Минск", "4" => "Витебск"));


?>