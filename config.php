<?php
$host = "YOUR_AWS_RDS_ENDPOINT";
$user = "YOUR_USERNAME";
$pass = "YOUR_PASSWORD";
$db   = "PEMINJAMAN_RUANG";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
