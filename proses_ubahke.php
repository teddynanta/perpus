<?php
include "koneksi.php";
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$npi = isset($_POST['npi']) ? $_POST['npi'] : '';
$npet = isset($_POST['npet']) ? $_POST['npet'] : '';
$tgl = isset($_POST['tgl']) ? $_POST['tgl'] : '';
$tglke = isset($_POST['tglke']) ? $_POST['tglke'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$query = "UPDATE kembali SET nama_peminjam='$npi',nama_petugas='$npet', tgl_pinjam='$tgl', tgl_kembali='$tglke', judul_buku='$judul' WHERE id='$id'";
mysql_query($query);
echo "<script> alert('Data Berhasil Diubah!')</script>";
echo "<meta http-equiv='refresh' content='0 url=index.php?hal=7'>";
