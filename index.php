<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan Universitas Bina Insan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }

        body {
            background-image: url('img/prism.png');
            background-size: 100%;
        }

        .s {
            text-shadow: 3px 2px 3px black;
        }

        .a {
            color: black !important;
        }
    </style>
</head>

<body class="w3-white">
    <div class="w3-content" style="max-width:1400px">
        <div class="w3-cell-row">
            <header class="w3-container w3-padding w3-center w3-white w3-opacity-min">
                <h1><b>PERPUSTAKAAN UNIVERSITAS BINA INSAN</b>
                </h1>
            </header>
            <div class="w3-container w3-row w3-red w3-padding-small" align="center">Selamat Datang di Perpustakaan <span class="w3-tag w3-light-blue">Universitas Bina Insan</span></div>
            <nav class="navbar navbar-expand-lg navbar-light w3-light-grey w3-medium">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=1'>BERANDA</a>
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <a class=" nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=2'>KELOLA BUKU</a>
                        <?php elseif (isset($_SESSION['user']) || !isset($_SESSION['login'])) : ?>
                            <a class=" nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=2'>CARI BUKU</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <a class=" nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=3'>KELOLA ANGGOTA</a>
                            <a class=" nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=6'>KELOLA PEMINJAMAN</a>
                            <a class=" nav-item nav-link w3-bar-item w3-hover-text-red a" href='?hal=7'>KELOLA PENGEMBALIAN</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['login'])) : ?>
                            <a class="nav-item nav-link w3-bar-item w3-hover-text-red a" href='logout.php'>LOGOUT</a>
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['login'])) : ?>
                            <a class="nav-item nav-link w3-bar-item w3-hover-text-red a" href='login.php'>LOGIN</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
            <div class=" w3-container w3-responsive w3-text-white w3-padding w3-margin-top">
                <h2 class="s">
                    <?php
                        $hal = $_GET['hal'];
                        switch ($hal) {
                            case "1";
                                echo "Beranda";
                                break;

                            case "2";
                                echo "Buku";
                                break;

                            case "3";
                                echo "Kelola Anggota";
                                break;

                            case "4";
                                echo "Tambah Buku";
                                break;

                            case "5";
                                echo "Edit Buku";
                                break;

                            case "6";
                                echo "Kelola Peminjaman";
                                break;

                            case "7";
                                echo "Kelola Pengembalian";
                                break;

                            case "8";
                                echo "Kelola Peminjaman";
                                break;

                            case "9";
                                echo "Kelola Pengembalian";
                                break;

                            case "10";
                                echo "Peminjaman";
                                break;

                            case "11";
                                echo "Kelola User";
                                break;

                            case "12";
                                echo "Kelola User";
                                break;

                            case "13";
                                echo "Informasi Peminjaman";
                                break;

                            case "14";
                                echo "Detail Buku";
                                break;

                            default;
                                echo "Beranda";
                                break;
                        }
                    ?>
                </h2>

                <div class="w3-col m9">
                    <?php
                        $buku = mysql_fetch_array($query);
                        $hal = $_GET['hal'];
                        switch ($hal) {
                            case "1";
                                include "home.php";
                                break;

                            case "2";
                                include "buku.php";
                                break;

                            case "3";
                                include "admin.php";
                                break;

                            case "4";
                                include "tambah.php";
                                break;

                            case "5";
                                include "ubah.php";
                                break;

                            case "6";
                                include "pinjam.php";
                                break;

                            case "7";
                                include "kembali.php";
                                break;

                            case "8";
                                include "ubahpi.php";
                                break;

                            case "9";
                                include "ubahke.php";
                                break;

                            case "10";
                                include "pi.php";
                                break;

                            case "11";
                                include "edit.php";
                                break;

                            case "12";
                                include "new.php";
                                break;

                            case "13";
                                include "balik.php";
                                break;

                            case "14";
                                include "detail.php";
                                break;

                            default;
                                include "home.php";
                                break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="w3-dark-grey w3-padding w3-margin-top">
        <div class="w3-container w3-row">
            <div class="w3-col m4 s12">
                <p>Follow Our Social Media!</p>
                <p><i class="fa fa-instagram fa-fw"></i> <a href="https://www.instagram.com/univ.binainsan/" target="_blank">@univ.binainsan</a></p>
                <p><i class="fa fa-twitter fa-fw"></i> <a href="https://www.twitter.com/Univ_BI" target="_blank">@Univ_BI</a></p>
            </div>
            <div class="w3-col m4 s12">
                <p>Visit Our Webiste!</p>
                <p><i class="fa fa-globe fa-fw"></i> <a href="https://www.univbinainsan.ac.id" target="_blank"> Universitas Bina Insan</a></p>
                <p><i class="fa fa-book fa-fw"></i> <a href="https://www.portal.univbinainsan.ac.id" target="_blank"> AMS Universitas Bina Insan</a></p>
            </div>
            <div class="w3-col m4 s12">
                <p>Contact Us!</p>
                <p>Jln. Jendral Besar Moh. Soeharto KM. 13<br>
                    Kelurahan Lubuk Kupang Kec. Lubuk Linggau Selatan 1<br>
                    Kota Lubuk Linggau Sumatera Selatan<br>
                    36125<br>
                    Telp. (+62) 733 452218</p>
            </div>
            <div class="w3-col m12 w3-center" style="margin-bottom:2px">
                <p>Universitas Bina Insan @2019 | Created by <a href="admins.php" target="_blank">Us</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>