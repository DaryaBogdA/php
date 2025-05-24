<?php
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $anons = filter_var($_POST['anons'], FILTER_SANITIZE_STRING);
	$type = htmlspecialchars($_POST['type']);
	
	echo "<div onclick='$(this).remove()'><h1>".$title."</h1><h3>".$type."</h3><p>".$anons."</p></div>";
?>