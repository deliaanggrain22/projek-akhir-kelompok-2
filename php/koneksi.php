<?php
$host = 'localhost';
$nama = 'root';
$pass = ''; //tolong diganti sesuai perangkat sendiri
$db = 'db_muamalat';

$koneksi = mysqli_connect($host, $nama, $pass, $db);
if (!$koneksi) {
    echo "Failed to connect to Database: " . mysqli_connect_error();
}
?>