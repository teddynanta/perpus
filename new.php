<h3>Silahkan tambahkan anggota(user/admin) pada menu dibawah ini!</h3><br>
<form action="proses.php" method="post">
    <table width="50%" cellpadding="0">
        <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td><input type="text" class="w3-input w3-border w3-light-grey" name="nama" placeholder="Masukkan Nama Anda"></td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td><b>:</b></td>
            <td><input type="text" class="w3-input w3-border w3-light-grey" name="uname" placeholder="Masukkan Username"></td>
        </tr>
        <tr>
            <td><b>Password</b></td>
            <td><b>:</b></td>
            <td><input type="password" class="w3-input w3-border w3-light-grey" name="pw" placeholder="Masukkan Password"></td>
        </tr>
        <tr>
            <td><b>Tipe User</b></td>
            <td><b>:</b></td>
            <td>
                <select class="w3-select" name="user">
                    <option value="Admin" name="tipe">Admin</option>
                    <option value="User" name="tipe">User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3" align="center">
                <button type="submit" name="daftar" class="w3-button w3-blue">Daftar</button>
            </td>
        </tr>
    </table>
</form>