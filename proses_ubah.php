<?php
include "koneksi.php";
$qry = mysql_query("SELECT * FROM buku WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$stok = isset($_POST['stok']) ? $_POST['stok'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : '';
$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
$sub = isset($_POST['sub']) ? $_POST['sub'] : '';
$foto = $_FILES['foto']['name'];
$tmps = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmps, 'img/' . $foto);
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($tmp, 'buku/' . $file);
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$query = "UPDATE buku SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang' , stok='$stok' , nama_file='$file' , tahun_terbit='$tahun' , sinopsis='$sinopsis' , kategori='$kategori' , sub_kategori='$sub' , foto='$foto' WHERE id='$id'";
mysql_query($query);
echo "<script> alert('Data Berhasil Diubah!')</script>";
echo "<meta http-equiv='refresh' content='0 url=index.php?hal=2'>";