<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM buku WHERE id ='$id'");
$r = mysql_fetch_assoc($query);
?>
<div class="w3-container">
  <h2><?= $r['judul']; ?></h2>
  <div class="w3-card-4 w3-white" style="width : min-content">
    <img src="img/<?= $r['foto']; ?>" width="200px" alt="Person">
  </div>
  <p>Pengarang : <?= $r['pengarang']; ?></p>
  <p>Penerbit : <?= $r['penerbit']; ?></p>
  <p>Tahun Terbit : <?= $r['tahun_terbit']; ?></p>
  <p>Kategori : <?= strtoupper($r['kategori']); ?></p>
  <p>Sub-kategori : <?= strtoupper($r['sub_kategori']); ?></p>
  <p>Lokasi : <?php $lokasi1 = substr($r['kategori'], 0, 3);
              $lokasi2 = substr($r['sub_kategori'], 0, 3);
              $lokasi = strtoupper($lokasi1);
              $lokasii = strtoupper($lokasi2);
              echo "R." . $lokasi . "-" . $lokasii . "-" . $r['id']; ?></p>
  <p align="justify">Sinopsis : <br><?= $r['sinopsis']; ?></p>
  <?php if (isset($_SESSION['admin'])) { ?>
    <center> <button class="w3-button w3-blue" onclick="top.location='index.php?hal=5&id=<?= $r[id] ?>'">EDIT</button></center><br>
    <center> <button class="w3-button w3-blue" onclick="top.location='hapus.php?id=<?= $r[id] ?>'">HAPUS</button></center>
  <?php } else { ?>
    <?php if ($r['nama_file'] == "") { ?>
      <center><button class="w3-button w3-blue" onclick="top.location='index.php?hal=10&id=<?= $r[id] ?>'">PINJAM</button></center>
    <?php } else { ?>
      <center><input type="button" name="dl" class="w3-button w3-blue" onclick="top.location='dl.php?nama_file=<?= $r[nama_file] ?>'" value="DOWNLOAD"></center>
    <?php } ?>
  <?php } ?>
</div>