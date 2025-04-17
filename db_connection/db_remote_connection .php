<?php
$server = 'localhost';
$user = 'u499380346_arnau';
$password = 'j&go#U1^]h2L';
$db_name = 'u499380346_tort_runners';

//connect to databas
$conn = mysqli_connect($server, $user, $password, $db_name );

//check connection
if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
};
?>