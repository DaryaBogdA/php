
<?php
    $title = 'Про нас';
    require "block/header.php";
?>
<h1>Про нас</h1>
<!--<form action="check_post.php" method="post">-->
<form action="check_get.php" method="get">
    <input type="text" name="name" placeholder="Enter name" class="furm-control"><br>
    <input type="text" name="email" placeholder="Enter email" class="furm-control"><br>
    <input type="text" name="password" placeholder="Enter password" class="furm-control"><br>
    <textarea name="message" placeholder="Enter message" class="furm-control"></textarea><br>
    <input type="submit" value="Отправить" class="btn btn-success">
</form>
<?php
require "block/footer.php";
?>