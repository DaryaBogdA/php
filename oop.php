<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= 'PHP' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
class User
{
    const API = "API_KEY";
    public $name;
    public $email;
    public $pass;
    static $count = 0;

    function __construct($name, $email, $pass = '')
    {
        $this->set_data($name, $email, $pass);
        $this->get_data();
        User::$count++;
        // echo self::API;
    }

    function __destruct()
    {
        echo '__destruct<br>';
    }

    function set_data($name, $email, $pass = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }

    function get_data()
    {
        $pass = '';
        if ($this->pass != '') $pass = 'Password: ' . $this->pass;
        echo "User name: $this->name. Email: $this->email. $pass<br>";
    }

    static function get_count()
    {
        echo self::$count . '<br>';
    }
}

$admin = new User('Admin', 'admin@itproger.com', '123456');
$bob = new User('Bob', 'bob@itproger.com');
$alex = new User('Alex', 'alex@itproger.com');

User::get_count();
// User::$count = 5;
// echo User::API;
?>
</body>

</html>