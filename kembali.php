<h3>Daftar Pengembalian Buku</h3><br>
<?php

$cari = isset($_POST['cari']) ? $_POST['cari'] : '';
$query = mysql_query("SELECT * FROM kembali WHERE nama_peminjam LIKE '%$cari%' OR nama_petugas LIKE'%$cari%' OR tgl_pinjam LIKE '%$cari%' OR judul_buku LIKE '%$cari%'");

?>
<table width="40%" border="0">
    <form action="" method="post">
        <tr>
            <td width="20%">
                <label class="w3-text-white"><b>Cari :</b></label>
                <input type="text" name="cari" class="w3-input w3-border w3-light-grey w3-animate-input" style="width: 30%" autocomplete="off">
                <button type="submit" class="w3-button w3-blue" style="width: 30%" name="submit"> CARI</button>
            </td>
        </tr>
    </form>
</table>
<br>
<div class="w3-responsive">
    <table border="1" class="w3-table w3-hoverable">
        <tr class="w3-indigo">

            <th>NO.</th>
            <th>Nama Peminjam</th>
            <th>Nama Petugas</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
            <th>Judul Buku</th>
            <th>Denda</th>
            <th>Kelola</th>

        </tr>
        <?php $i = 1; ?>
        <?php while ($kembali = mysql_fetch_array($query)) :  ?>
            <tr class="w3-light-gray w3-hover-grey">
                <td><?= $i ?></td>
                <td><?= $kembali['nama_peminjam'] ?></td>
                <td><?= $kembali['nama_petugas'] ?></td>
                <td><?php $date = $kembali['tgl_pinjam'];
                        echo date("d-m-Y", strtotime($date)); ?></td>
                <td><?php $dates = $kembali['tgl_kembali'];
                        echo date("d-m-Y", strtotime($dates)); ?></td>
                <td><?= $kembali['judul_buku'] ?></td>
                <td><?= $kembali['denda'] ?></td>
                <td><?php echo "<a href=index.php?hal=9&id=$kembali[id]>Edit</a>" ?></td>
            </tr><?php $i++;
                    endwhile; ?>
    </table>
</div>