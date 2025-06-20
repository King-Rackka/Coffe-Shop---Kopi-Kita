<?php
$host = "localhost"; 
$user = "root";
$pass = "";
$database = "db_cafe";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (!$koneksi) {
    echo "Koneksi gagal: " . mysqli_connect_error();
} 
?>
