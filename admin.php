    <?php
    $cari = isset($_POST['cari']) ? $_POST['cari'] : '';
    $query = mysql_query("SELECT * FROM login WHERE nama_lengkap LIKE '%$cari%' OR username LIKE'%$cari%' OR level LIKE '%$cari%'");
    ?>

    <h2>Daftar User di Database(admin/user/pimpinan)</h2>

    <table width="100%" border="0">
        <form action="" method="post">
            <tr>
                <td width="60%">
                    <label class="w3-text-white"><b>Cari :</b></label>
                    <input type="text" name="cari" class="w3-input w3-border w3-light-grey w3-animate-input" style="width: 30%" autocomplete="off">
                    <button type="submit" class="w3-button w3-blue" style="width: 30%" name="submit"> CARI</button>
                </td>
                <td width="40%" align="right" valign="bottom">
                    <button type="submit" class="w3-button w3-blue button" style="width: 50%" name="add" onclick="top.location='index.php?hal=12'">+ TAMBAH USER</button>
                </td>
            </tr>
        </form>
    </table>
    <div class="w3-responsive">
        <table border="1" class="w3-table w3-hoverable">
            <tr class="w3-indigo">
                <th>NO.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Kelola</th>
            </tr>
            <?php $i = 1; ?>
            <?php while ($login = mysql_fetch_array($query)) : ?>
                <tr class="w3-light-gray w3-hover-grey">
                    <td><?= $i ?></td>
                    <td><?= $login['nama_lengkap'] ?></td>
                    <td><?= $login['username'] ?></td>
                    <td><?= $login['password'] ?></td>
                    <td><?= $login['level'] ?></td>
                    <td><?php echo "<a href=index.php?hal=11&id=$login[id]>Ubah</a> | <a href=delete.php?id=$login[id]>Hapus</a>" ?></td>
                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>
        </table>
    </div>