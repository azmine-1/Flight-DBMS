<?php
$host = "localhost";
$database = "afaik";
$user = "afaik";
$password = "catduak2";

$connect = mysqli_connect($host, $user, $password, $database) 
or die(mysqli_error());
echo "<div>Connected to MySQL Database <b>$database</b></div>";
?>
