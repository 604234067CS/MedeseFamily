<?php 
// $hostname = "localhost";
// $username = "root";
// $password = "";
// $dbname = "medese_family_db";

$hostname = "remotemysql.com";
$username = "ZRq7Ly4szF";
$password = "Hui9dTc5k5";
$dbname = "ZRq7Ly4szF";
global $conn; //เพิ่ม
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");

if(!$conn){
    die('Could not connect:'. mysqli_connect_error());
}


