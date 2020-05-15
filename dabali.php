<?php

require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$i = 1;
$querys = mysql_query("SELECT * FROM kembali");
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
                                <th>Nama Peminjam</th>
                                <th>Nama Petugas</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                            </tr>';
while ($hasil = mysql_fetch_assoc($querys)) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $hasil["judul_buku"] . '</td>
                <td>' . $hasil["nama_peminjam"] . '</td>
                <td>' . $hasil["nama_petugas"] . '</td>
                <td>' . $hasil["tgl_pinjam"] . '</td>
                <td>' . $hasil["tgl_kembali"] . '</td>
                <td>' . $hasil["denda"] . '</td>
                </tr>';
};
$html .= '</table>
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Bukti Peminjaman.pdf', 'I');
