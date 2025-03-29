<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db_name = '067_hotel_managment_system';

//connect to databas
$conn = mysqli_connect($server, $user, $password, $db_name );

//check connection
if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
};
?>