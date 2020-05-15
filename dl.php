<?php
session_start();
include "koneksi.php";
$nama = $_SESSION['nama'];
$nf = $_REQUEST['nama_file'];
$q = mysql_query("SELECT * FROM dl WHERE nama_pengunduh='$nama'");
$r = mysql_fetch_assoc($q);
if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda Belum Login')</script>";
    echo "<meta http-equiv ='refresh' content='0;
                    url= index.php?hal=1'>";
    exit();
}
if ($r['status'] == 1) {
    echo "<script>alert('Anda sudah pernah mendownload file ini!')</script>";
    echo "<meta http-equiv ='refresh' content='0;
                    url= index.php?hal=1'>";
    exit();
} else {


    $query = mysql_query("INSERT INTO dl VALUES('','$nama','$nf',CURDATE(),1)");
    if (isset($_GET['nama_file'])) {
        $nama_file    = $_GET['nama_file'];
        $filename = basename($_GET['nama_file']);
        $back_dir    = "buku/";
        $file = $back_dir . $_GET['nama_file'];

        if (file_exists($file)) {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename= $filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            readfile($file);
            exit();
        } else {
            echo "<script>alert('Buku tidak ditemukan!')</script>";
            header("location : index.php?hal=2");
        }
    }
}
