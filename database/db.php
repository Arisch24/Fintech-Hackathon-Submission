<?php

$servername = 'localhost';
$db_username = 'arisch';
$db_password = 'root';
$db_name = 'Hackathon';

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

// check connection
if(!$conn){
    die('Connection failed'. mysqli_connect_error());
}