<?php session_start(); ?>
<h3>Daftar Buku yang ada di database</h3><br>
<?php

$cari = isset($_POST['cari']) ? $_POST['cari'] : '';
$query = mysql_query("SELECT * FROM buku WHERE judul LIKE '%$cari%' OR penerbit LIKE'%$cari%' OR pengarang LIKE '%$cari%'");

?>
<div class="w3-container w3-row">
    <form action="" method="post">
        <div class="w3-col m3 s5">
            <label class="w3-text-white"><b>Cari :</b></label>
            <input type="text" name="cari" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off">
            <button type="submit" class="w3-button w3-margin-top w3-blue" name="submit"> CARI</button>
        </div>
        <div class="w3-col m12">&nbsp;</div>
    </form>
    <div class="w3-col m8">&nbsp;</div>
    <?php if (isset($_SESSION['admin'])) : ?>
        <button type="submit" class="w3-button w3-col m2 s5 w3-margin-top w3-blue button" name="add" onclick="top.location='index.php?hal=4'"> + TAMBAH BUKU</button>
    <?php endif; ?>
</div>
<div class="w3-row w3-center w3-content w3-margin-left">
    <?php while ($r = mysql_fetch_assoc($query)) : ?>
        <div class="w3-padding w3-margin-left w3-margin-top w3-card w3-hover-shadow w3-white w3-col m3 s10" style="cursor :pointer" onclick="top.location = 'index.php?hal=14&id=<?= $r[id] ?>'">
            <img src="img/<?= $r['foto']; ?>" height="300px" class="w3-center" alt="<?php if ($r['foto']) {
                                                                                            echo $r['judul'];
                                                                                        } else {
                                                                                            echo "Tidak Ada Foto";
                                                                                        } ?>">
            <div class="w3-container w3-center">
                <p><?= $r['judul'] ?></p>
                <p><?= $r['pengarang'] ?></p>
            </div>
        </div>

    <?php endwhile; ?>
</div>