<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_tokoray';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal terhubung ke database');
?>