<?php

$server = 'localhost';
$login = 'aleex_dino';
$pass = 'D111111d';
$d_base = 'aleex_dino';

$db = mysqli_connect($server, $login, $pass, $d_base);

if ($db == false) {
    echo 'не удалось подключиться к ДБ <br>';
    echo mysqli_connect_error();
    exit();
}

?>
