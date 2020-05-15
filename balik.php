<?php
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$qry = mysql_query("SELECT * FROM pinjam WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
$max = $tampil['durasi'];
$pinjam = date("d-m-Y", strtotime("$tampil[tgl_pinjam]"));
$batas = date("d-m-Y", strtotime("$pinjam +$max day"));
$pengembalian = date("d-m-Y", time());
$lamapi = $pengembalian - $pinjam;
?>
<h3>Informasi Peminjaman</h3><br>
<?php if ($pengembalian > $batas) { ?>
    <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Peringatan!</h3>
        <p>Anda melewati batas maksimal pengembalian buku, anda akan dikenakan denda sebesar Rp.1000 per hari keterlambatan!</p>
    </div>
<?php } ?>
<form <?php echo "action=proses_balik.php?id=$tampil[id]" ?> method="post">
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
            <td><input type="text" name="tgl" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['tgl_pinjam']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Lama Pinjam</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="durasi" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $lamapi; ?> Hari" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Judul Buku</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="judul" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['judul_buku']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Denda</b></td>
            <td><b>:</b></td>
            <td>
                <input type="text" name="denda" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?php if ($pengembalian > $batas) {
                                                                                                                        $denda = $lamapi * 1000;
                                                                                                                        echo "Rp. " . $denda;
                                                                                                                    } else {
                                                                                                                        echo "Rp. 0";
                                                                                                                    } ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3" align="center">
                <button type="submit" class="w3-button w3-blue" style="width:50%" name="kembali">Kembalikan</button>
            </td>
        </tr>
    </table>
</form>