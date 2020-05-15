<?php
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$qry = mysql_query("SELECT * FROM kembali WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
?>
<h3>Silahkan edit data buku pada menu dibawah ini!</h3><br>
<form <?php echo "action=proses_ubahke.php?id=$tampil[id]" ?> method="post">
    <table width="50%" cellpadding="3" border="0">
        <tr>
            <td><b>Nama Peminjam</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="npi" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['nama_peminjam']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Nama Petugas</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="npet" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['nama_petugas']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Tanggal Pinjam</b></td>
            <td><b>:</b></td>
            <td><input type="date" name="tgl" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['tgl_pinjam']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Tanggal Kembali</b></td>
            <td><b>:</b></td>
            <td><input type="date" name="tglke" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['tgl_kembali']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Judul Buku</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="judul" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['judul_buku']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3" align="center">
                <button type="submit" class="w3-button w3-blue" style="width:35%" name="ubah">Edit</button>
            </td>
        </tr>
    </table>
</form>