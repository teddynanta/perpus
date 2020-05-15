<?php
include "koneksi.php";
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$npi = isset($_POST['npi']) ? $_POST['npi'] : '';
$npet = isset($_POST['npet']) ? $_POST['npet'] : '';
$tgl = isset($_POST['tgl']) ? $_POST['tgl'] : '';
$durasi = isset($_POST['durasi']) ? $_POST['durasi'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$ubah = isset($_POST['ubah']) ? $_POST['ubah'] : '';
$query = mysql_query("UPDATE pinjam SET nama_peminjam='$npi',nama_petugas='$npet', tgl_pinjam='$tgl', durasi='$durasi', judul_buku='$judul' WHERE id='$id'") or die(mysql_error());
if ($query) {
    echo "<script>alert('Data berhasil diubah!')</script>";
    echo "<meta http-equiv ='refresh' content ='0 url=index.php?hal=6'>";
}
