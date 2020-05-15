<?php
session_start();
if (!isset($_SESSION['login'])) { ?>
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
    <h3>Selamat Datang di Perpustakaan Universitas Bina Insan!</h3>
<?php } elseif (isset($_SESSION['login'])) { ?>
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
    <h3 class="w3-col m8">Selamat Datang di Perpustakaan Universitas Bina Insan, <?= $_SESSION['nama'] ?>!</h3>
    <?php if ($_SESSION['pimpinan']) { ?>
        <a href="daus.php">Laporan Data User</a><br>
        <a href="dabu.php">Laporan Data Buku</a><br>
        <a href="dajam.php">Laporan Data Peminjaman</a><br>
        <a href="dabali.php">Laporan Data Pengembalian</a><br>
        <a href="daload.php">Laporan Data Download</a><br>
    <?php } elseif ($_SESSION['user']) {
                                                                                        $qrq = mysql_query("SELECT * FROM pinjam WHERE nama_peminjam = '$_SESSION[nama]' AND status = 1");
    ?>
        <caption>
            <h4 class="w3-center">Daftar Buku yang Dipinjam</h4>
        </caption>
        <table border="1" cellspacing="0" cellpadding="10" width="100%" class="w3-table w3-hoverable w3-col m8">
            <tr class="w3-indigo">

                <th>NO.</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Harus Dikembalikan Sebelum</th>
                <th>Judul Buku</th>

            </tr>
            <?php $i = 0; ?>
            <?php while ($lihat = mysql_fetch_array($qrq)) :
                                                                                            $max = $lihat['durasi'];
                                                                                            $pinjam = date('d-m-Y', strtotime("$lihat[tgl_pinjam]"));
                                                                                            $batas = date('d-m-Y', strtotime("$pinjam +$max day"));
                                                                                            $pengembalian = date("d-m-Y", time());
                                                                                            $lamapi = $pengembalian - $pinjam;
            ?>


                <?php if ($pinjam < $batas) { ?>
                    <tr class="w3-red w3-hover-grey">
                    <?php } else { ?>
                    <tr class="w3-light-gray w3-hover-grey">
                    <?php } ?>
                    <td><?= ++$i ?></td>
                    <td><?= $lihat['nama_peminjam'] ?></td>
                    <td><?= $pinjam ?></td>
                    <td><?= $batas ?> </td>
                    <td><?= $lihat['judul_buku'] ?></td>
                    </tr>
                <?php
                                                                                        endwhile; ?>
        </table>

    <?php
                                                                                    }
    ?>
<?php } ?>