<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda bukan admin!')";
    echo "meta http-equiv ='refresh' content='0 url=index.php'>";
    exit();
} elseif (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda belum login!')";
    echo "meta http-equiv ='refresh' content='0 url=index.php'>";
    exit();
}
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$qry = mysql_query("SELECT * FROM login WHERE id='$id'") or die(mysql_error());
$tampil = mysql_fetch_assoc($qry);
?>
<h3>Silahkan edit data anggota pada menu dibawah ini!</h3><br>
<form <?php echo "action=proses_edit.php?id=$tampil[id]" ?> method="post">
    <table width="50%" cellpadding="3" border="0">
        <tr>
            <td><b>Nama</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="nama" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['nama_lengkap']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="user" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['username']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Password</b></td>
            <td><b>:</b></td>
            <td><input type="text" name="pw" class="w3-input w3-border w3-light-grey w3-animate-input" value="<?= $tampil['password']; ?>" autocomplete="off"></td>
        </tr>
        <tr>
            <td><b>Level</b></td>
            <td><b>:</b></td>
            <td>
                <select class="w3-select" name="level" id="level">
                    <?php if ($tampil['level'] == 'admin') : ?>
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                        <option value="pimpinan">Pimpinan</option>
                    <?php elseif ($tampil['level'] == 'user') : ?>
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                        <option value="pimpinan">Pimpinan</option>
                    <?php else : ?>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="pimpinan" selected>Pimpinan</option>
                    <?php endif; ?>
                </select>
            </td>
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