<?php

$server = "localhost";
$username = "root";
$password = "mysql";
$database = "phinhpc05786_asm_php1";

global $connection;

$connection = mysqli_connect($server, $username, $password, $database);


if(!$connection){
    echo "Lỗi";
    die();
}



?>
