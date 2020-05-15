<?php

require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$querys = mysql_query("SELECT * FROM pinjam WHERE id='$id'");
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>BUKTI PINJAM</h1><br>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>Id Pinjam</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Petugas</th>
                                <th>Tanggal Pinjam</th>
                                <th>Durasi Pinjam</th>
                                <th>Judul Buku</th>
                            </tr>';
while ($hasil = mysql_fetch_assoc($querys)) {
    $tgl = strtotime($hasil['tgl_pinjam']);
    $html .= '<tr>
                <td>' . $hasil["id"] . '</td>
                <td>' . $hasil["nama_peminjam"] . '</td>
                <td>' . $hasil["nama_petugas"] . '</td>
                <td>' . $pinjam = date('d-m-Y', $tgl) . '</td>
                <td>' . $hasil["durasi"] . ' Hari </td>
                <td>' . $hasil["judul_buku"] . '</td>
                </tr>' . '</table>' . '<p></p><h3>Perhatian, Ketentuan Meminjam buku adalah sebagai berikut!</h3>
                <p>
                    1. Peminjaman memiliki masa pinjam selama 7 hari sejak tanggal peminjaman<br>
                    2. Apabila melewati masa pinjam maka akan dikenakan denda sebesar Rp.1000/hari<br>
                    3. Buku yang dikembalikan <u><b>HARUS</b></u> seperti keadaan saat awal peminjaman<br>
                    4. Apabila terjadi kerusakan/kehilangan peminjam <u><b>WAJIB</b></u> mengganti buku tersebut dalam jangka waktu 5 hari<br>
                    5. Untuk info lebih lanjut silahkan hubungi Admin<br>
                    <p><i>catatan : harap simpan bukti pinjam ini, jangan sampai hilang!</i></p><br>
                    <h2><p>Buku ini harus dikembalikan sebelum tanggal : <b><u>' . $bef = date('d-m-Y', strtotime("+7 days", $tgl)) . '</u></b></p></h2>';
};
$html .= '
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Bukti Peminjaman.pdf', 'I');
