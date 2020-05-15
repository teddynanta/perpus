<?php
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$hapus = mysql_query("DELETE FROM buku WHERE id ='$id'") or die(mysql_error());

if ($hapus) {
    echo "<script>alert('Hapus Buku Berhasil!')</script>";
    echo "<meta http-equiv='refresh' content='0 url=index.php?hal=2'>";
}
