<?php

require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$i = 1;
$querys = mysql_query("SELECT * FROM buku");
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>Laporan Data Pengembalian Buku dari Perpustakaan Universitas Bina Insan</h1><br>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                            <th>#</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            <th>Sub-kategori</th>
                            <th>Stok</th>
                            <th>Nama File</th>
                            <th>Foto</th>
                            </tr>';
while ($hasil = mysql_fetch_assoc($querys)) {
    $html .= '<tr>
    <td>' . $hasil["judul"] . '</td>
    <td>' . $hasil["penerbit"] . '</td>
    <td>' . $hasil["pengarang"] . '</td>
    <td>' . $hasil["tahun_terbit"] . '</td>
    <td>' . $hasil["kategori"] . '</td>
    <td>' . $hasil["sub_kategori"] . '</td>
    <td>' . $hasil["stok"] . '</td>
    <td>' . $hasil["nama_file"] . '</td>
    <td><img src="img/' . $hasil["foto"] . '" height="100px"></td>
    </tr>';
};
$html .= '</table>
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Bukti Peminjaman.pdf', 'I');
