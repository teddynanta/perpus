<?php
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$hapus = mysql_query("DELETE FROM login WHERE id ='$id'") or die(mysql_error());

if ($hapus) {
    echo "<script>alert('Ubah Data Berhasil!')</script>";
    echo "<meta http-equiv='refresh' content='0 url=index.php?hal=3'>";
}
