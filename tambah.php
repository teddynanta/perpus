<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Silahkan tambahkan buku pada menu dibawah ini!</h3><br>
    <form action="?hal=4" method="post" enctype="multipart/form-data">
        <table width="50%" cellpadding="3">
            <tr>
                <td><b>Judul Buku</b></td>
                <td><b>:</b></td>
                <td><input type="text" name="judul" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Pengarang</b></td>
                <td><b>:</b></td>
                <td><input type="text" name="pengarang" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Penerbit</b></td>
                <td><b>:</b></td>
                <td><input type="text" name="penerbit" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Tahun Terbit</b></td>
                <td><b>:</b></td>
                <td><input type="int" name="tahun" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off"></td>
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
                <td><textarea name="sinopsis" class="w3-input w3-border w3-light-grey w3-animate-input" cols="20" rows="5"></textarea></td>
            </tr>
            <tr>
                <td><b>Stok</b></td>
                <td><b>:</b></td>
                <td><input type="int" name="stok" class="w3-input w3-border w3-light-grey w3-animate-input" autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>File</b></td>
                <td><b>:</b></td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td><b>Foto</b></td>
                <td><b>:</b></td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3" align="right"><button type="submit" class="w3-button w3-blue" style="width:100%" name="add">TAMBAH BUKU</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['add'])) {
        include "koneksi.php";
        $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
        $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
        $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
        $tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
        $sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : '';
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $sub = isset($_POST['sub']) ? $_POST['sub'] : '';
        $stok = isset($_POST['stok']) ? $_POST['stok'] : '';
        $foto = $_FILES['foto']['name'];
        $tmps = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmps, 'img/' . $foto);
        $file = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($tmp, 'buku/' . $file);
        $query = mysql_query("INSERT INTO buku VALUES ('','$judul','$penerbit' ,'$pengarang','$stok','$file','$foto','$kategori','$sub','$tahun','$sinopsis')") or die(mysql_error());

        if ($query == true) {
            echo "<script>alert('Ubah Data Berhasil!')</script>";
            echo "<meta http-equiv='refresh' content='0 url=index.php?hal=2'>";
        }
    }
    ?>
</body>

</html>