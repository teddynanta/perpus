<?php
error_reporting(1);
$server ="localhost";
$username = "root";
$password = "";
$database = "perpus";

mysql_connect($server,$username,$password) or die("koneksi gagal");
mysql_select_db($database) or die("database tidak dapat digunakan");
?>