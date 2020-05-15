<?php
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$qry = mysql_query("SELECT * FROM buku WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
?>
<h3>Silahkan edit data buku pada menu dibawah ini!</h3><br>
<form <?php echo "action=proses_ubah.php?id=$tampil[id]" ?> method="post" enctype="multipart/form-data">
    <table width="50%" cellpadding="3" border="0">
        <tr>
            <td><b>Judul Buku</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="judul" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['judul']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Penerbit</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="penerbit" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['penerbit']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Pengarang</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="pengarang" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['pengarang']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Tahun Terbit</b></td>
            <td><b>:</b></td>
            <td><input type="int" name="tahun" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['tahun_terbit']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td><b>:</b></td>
            <td>
                <select class="w3-select" name="kategori">
                    <option name="fiksi" id="fik">Fiksi</option>
                    <option name="non_fiksi" id="non">Non-Fiksi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Sub-Kategori</b></td>
            <td><b>:</b></td>
            <td>
                <select class="w3-select" name="sub">
                    <option name="novel" id="fik">NOVEL</option>
                    <option name="umum" id="non">UMUM</option>
                    <option name="mipa" id="fik">MIPA</option>
                    <option name="pemrograman" id="non">PEMROGRAMAN</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Sinopsis</b></td>
            <td><b>:</b></td>
            <td><textarea name="sinopsis" class="w3-input w3-border w3-light-grey w3-animate-input" cols="20" rows="5"><?= $tampil['sinopsis']; ?></textarea></td>
        </tr>
        <tr>
            <td><b>Stok</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="stok" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['stok']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>File</b></td>
            <td><b>:</b></td>
            <td><input type="file" name="file" accept=".pdf,.doc,.docx" alt="<?= $tampil['nama_file']; ?>"><?= $tampil['nama_file']; ?></td>
        </tr>
        <tr>
            <td><b>Foto</b></td>
            <td><b>:</b></td>
            <td><input type="file" name="foto" accept="image/*" default="<?= $tampil['foto']; ?>"><?= $tampil['foto']; ?></td>
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