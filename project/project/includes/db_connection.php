<?php
session_start();
$host="sql8.freesqldatabase.com";
$db_name ="sql8694178";
$db_user ="sql8694178";
$db_pass ="fy7xptEx3R";
$port_number ="3306";

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name, $port_number); 

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
