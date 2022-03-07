<?php

$server = 'localhost';
$login = '';
$pass = '';
$d_base = '';

$db = mysqli_connect($server, $login, $pass, $d_base);

if ($db == false) {
    echo 'не удалось подключиться к ДБ <br>';
    echo mysqli_connect_error();
    exit();
}

?>
