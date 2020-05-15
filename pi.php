<?php
session_start();
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$qry = mysql_query("SELECT * FROM buku WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda Belum Login')</script>";
    echo "<meta http-equiv ='refresh' content='0;
                    url= index.php?hal=1'>";
    exit();
}

if ($tampil['stok'] == 0) { ?>
    <div class="w3-row">
        <div class="w3-panel w3-red w3-col m12">
            <h3><i class="w3-margin-top fa fa-exclamation-triangle fa-fw"></i> Maaf, Buku yang anda cari sedang kosong!</h3>
            <p>Silahkan cari buku yang lain, <a href="index.php?hal=2">kembali</a></p>
        </div>
    </div>
<?php } else { ?>
    <h2 class="w3-center">Data buku yang akan anda pinjam</h2>
    <div class="w3-row">
        <div class="w3-panel w3-yellow w3-col m12">
            <h3><i class="w3-margin-top fa fa-info-circle fa-fw"></i> Perhatian, Ketentuan Meminjam buku adalah sebagai berikut!<i class="w3-margin-top fa fa-info-circle fa-fw"></i></h3>
            <p class="w3-margin-left">
                1. Peminjaman memiliki masa pinjam selama 7 hari sejak tanggal peminjaman.<br>
                2. Apabila melewati masa pinjam maka akan dikenakan denda sebesar Rp.1000/hari.<br>
                3. Buku yang dikembalikan <u><b>HARUS</b></u> seperti keadaan saat awal peminjaman.<br>
                4. Apabila terjadi kerusakan/kehilangan peminjam <u><b>WAJIB</b></u> mengganti buku tersebut dalam jangka waktu 5 hari.<br>
                5. Untuk info lebih lanjut silahkan hubungi <a href="admins.php" target="_blank">Admin</a>.<br>
            </p>
        </div>
    </div>
    <table class="w3-center">
        <form action="printt.php" method="post">
            <style>
                .font {
                    font-size: 18px;
                }
            </style>
            <tr class="font">
                <td>Id Buku</td>
                <td>:</td>
                <td><input type="text" name="id" value="<?= $tampil['id'] ?>"></td>
            </tr>
            <tr class="font">
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?= $tampil['judul'] ?>"></td>
            </tr>
            <tr class="font">
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" value="<?= $tampil['penerbit'] ?>"></td>
            </tr>
            <tr class="font">
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang" value="<?= $tampil['pengarang'] ?>"></td>
            </tr>
            <tr class="font">
                <td>Stok</td>
                <td>:</td>
                <td><input type="text" name="stok" value="<?= $tampil['stok'] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3" align="center">
                    <button type="submit" name="pinjam" class="w3-button w3-blue" style="width: 40%">Pinjam</button>
                </td>
            </tr>
        </form>
    </table>
<?php } ?>