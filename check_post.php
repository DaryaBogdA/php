<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(trim($name) == ""){
        echo "You not enter name";
    } else if(strlen(trim($name)) < 3){
        echo "НЕ существует";
    } else if(trim($email) == ""||trim($password) == ""||trim($_POST['message']) == ""){
        echo "Enter all";
    } else {
//        echo "<p>$name $email $password $_POST[message]</p>";
//        foreach ($_POST as $key => $value){
//            echo "<p>$value</p>" ;
//        }
        header('Location: /about.php');
        exit;
    }

