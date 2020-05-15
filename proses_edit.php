<?php
include "koneksi.php";
$nama_lengkap = isset($_POST['nama']) ? $_POST['nama'] : '';
$username = isset($_POST['user']) ? $_POST['user'] : '';
$password = isset($_POST['pw']) ? $_POST['pw'] : '';
$level = isset($_POST['level']) ? $_POST['level'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$query = "UPDATE login SET username='$username', password='$password' , nama_lengkap='$nama_lengkap',  level='$level' WHERE id='$id'";
mysql_query($query);
echo "<script> alert('Data Berhasil Diubah!')</script>";
echo "<meta http-equiv='refresh' content='0 url=index.php?hal=11'>";
