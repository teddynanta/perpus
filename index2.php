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
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="shortcut/icon" href="favicon.ico">
    <link rel="stylesheet" href="jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery-1.12.4.js"></script>
    <script src="jquery-ui.js"></script>
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
            background-image: url('img/book3.jpg');
            background-size: 100%;
        }

        .s {
            text-shadow: 3px 2px 3px black;
        }
    </style>
</head>

<body class="w3-white">
    <table border="0" cellpadding="0" cellspacing="5px" width="100%" class="w3-white w3-opacity-min">
        <tr>
            <td align="right">
                <?php if (isset($_SESSION['login'])) : ?>
                    <a href="logout.php" class="w3-hover-red">Logout</a>
                <?php endif; ?>
                <?php if (!isset($_SESSION['login'])) : ?>
                    <a href="login.php" class="w3-hover-red">Login</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <div class="w3-content" style="max-width:1400px">
        <div class="w3-cell-row">
            <header class="w3-container w3-center w3-white w3-opacity-min">
                <h1><b>PERPUSTAKAAN UNIVERSITAS BINA INSAN</b>
                </h1>
            </header>
            <div class="w3-container w3-row w3-red w3-padding-small" align="center">Selamat Datang di Perpustakaan <span class="w3-tag w3-light-blue">Universitas Bina Insan</span></div>
            <div class="w3-bar w3-light-grey menu  w3-hide-small">
                <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=1'">BERANDA</button>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=2'">KELOLA BUKU</button>
                <?php elseif (isset($_SESSION['user']) || !isset($_SESSION['login'])) : ?>
                    <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=2'">CARI BUKU</button>
                <?php endif; ?>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=3'">KELOLA ANGGOTA</button>
                    <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=6'">KELOLA PEMINJAMAN</button>
                    <button class="w3-bar-item w3-button w3-hover-red w3-border" onclick="top.location = '?hal=7'">KELOLA PENGEMBALIAN</button>
                <?php endif; ?>
            </div>
            <div class="w3-container w3-text-white">
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
                            echo "Kelola Admin";
                            break;

                        case "12";
                            echo "Kelola Admin";
                            break;

                        default;
                            echo "Beranda";
                            break;
                    }
                    ?>
                </h2>
                <div class="w3-col m4">
                    <p>
                        <b>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            echo date("d/m/Y h:i a");
                            ?>
                        </b>
                    </p>
                    <p>
                        <div id="datepicker"></div>
                    </p>
                </div>
                <div class="w3-col m8">
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
                    // if (!isset($hal) && isset($_SESSION['login'])) {
                    //     echo "<h3>Selamat Datang di Perpustakaan Universitas Bina Insan, " . $_SESSION['nama'] . "!</h3>";
                    // } elseif (!isset($hal) && !isset($_SESSION['login'])) {
                    //     echo " <h3>Selamat Datang di Perpustakaan Universitas Bina Insan!</h3>";
                    // }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-dark-grey w3-padding-16 w3-margin-top">
        <div class="w3-container w3-row">
            <div class="w3-col m4 s12">
                <p>Follow Our Social Media!</p>
                <p><i class="fa fa-instagram fa-fw"></i> <a href="https://www.instagram.com/univ.binainsan/" target="_blank">@univ.binainsan</a></p>
                <p><i class="fa fa-twitter fa-fw"></i> <a href="https://www.twitter.com/Univ_BI" target="_blank">@Univ_BI</a></p>
            </div>
            <div class="w3-col m4 s12">
                <p>Visit Our Webiste!</p>
                <p><i class="fa fa-globe fa-fw"></i> <a href="https://www.univbinainsan.ac.id"> Universitas Bina Insan</a></p>
                <p><i class="fa fa-book fa-fw"></i> <a href="https://www.portal.univbinainsan.ac.id"> AMS Universitas Bina Insan</a></p>
            </div>
            <div class="w3-col m4 s12">
                <p>visit our social media and university website!</p>
            </div>
            <div class="w3-col w3-center">
                <p>Universitas Bina Insan @2019</p>
            </div>

        </div>
    </footer>
</body>

</html>