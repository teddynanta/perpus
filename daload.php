<?php

require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$i = 1;
$querys = mysql_query("SELECT * FROM dl");
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>Laporan Data Pengunduhan File dari Perpustakaan Universitas Bina Insan</h1><br>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>#</th>
                                <th>Nama Pengunduh</th>
                                <th>Nama File</th>
                                <th>Tanggal Unduh</th>
                            </tr>';
while ($hasil = mysql_fetch_assoc($querys)) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $hasil["nama_pengunduh"] . '</td>
                <td>' . $hasil["nama_file"] . '</td>
                <td>' . $hasil["tgl"] . '</td>
                </tr>';
};
$html .= '</table>
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Bukti Peminjaman.pdf', 'I');
