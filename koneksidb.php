<?php
//error_reporting(E_ALL ^ E_DEPRECATED); 

$host = 'localhost';
$user = 'id2351343_db_siretel';
$pass = 'dbpass';
$dbname = 'id2351343_db_siretel';
$koneksi = mysqli_connect($host,$user,$pass) or die (mysqli_error());
mysqli_select_db($koneksi,$dbname) or die("Databse Tidak Bisa Di Akses");
?>