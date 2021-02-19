<?php

$username = "id16190629_thesparksbank";
$password = "6#irtLp^8*WJnN6Km3W";
$server = "localhost";
$db = "id16190629_tsfbank";

$conn = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
   
?>