<?php
include "koneksi.php";
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$npi = isset($_POST['npi']) ? $_POST['npi'] : '';
$npet = isset($_POST['npet']) ? $_POST['npet'] : '';
$tgl = isset($_POST['tgl']) ? $_POST['tgl'] : '';
$denda = isset($_POST['denda']) ? $_POST['denda'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$kembali = isset($_POST['kembali']) ? $_POST['kembali'] : '';
$query = mysql_query("INSERT INTO kembali VALUES('','$npi','$npet','$tgl',CURDATE(),'$judul','$denda')")or die(mysql_error());
if($query){
echo "<script>alert('Buku berhasil dikembalikan!')</script>";
echo "<meta http-equiv ='refresh' content ='0 url=index.php?hal=6'>";
$w = mysql_query("SELECT * FROM buku WHERE judul = '$judul'");
$r = mysql_fetch_assoc($w);
$r['stok']++;
$q = mysql_query("UPDATE buku SET stok='$r[stok]' WHERE judul='$judul'");
$qq = mysql_query("UPDATE pinjam SET status=0 WHERE id='$id'");
}
