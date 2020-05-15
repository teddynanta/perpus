<?php
session_start();
include "koneksi.php";
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$stok = isset($_POST['stok']) ? $_POST['stok'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$peminjam = $_SESSION['nama'];
$date = date(Y - d - m);
$query = mysql_query("INSERT INTO pinjam VALUES ('', '$peminjam', 'admin', CURDATE(), '7', '$judul',1)") or die(mysql_error());
if ($query) {
    $w = mysql_query("SELECT * FROM buku WHERE id = '$id'");
    $a = mysql_query("SELECT * FROM pinjam ORDER BY id DESC");
    $b = mysql_fetch_assoc($a);
    $r = mysql_fetch_assoc($w);
    $r['stok']--;
    $q = mysql_query("UPDATE buku SET stok= '$r[stok]' WHERE id ='$id'");

    echo "<script>alert('Pinjam Buku Berhasil!')</script>";
    echo "<meta http-equiv='refresh' content='0 url=print.php?id=$b[id]'>";
}
