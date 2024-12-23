<?php
$host = "localhost";
$username = "root";  
$password = "";      
$database = "pepan_db"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>  