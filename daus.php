<?php

require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$i = 1;
$querys = mysql_query("SELECT * FROM login WHERE level='admin' OR level='user' ORDER BY level ASC");
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>Laporan Data User dari Perpustakaan Universitas Bina Insan</h1><br>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
                            </tr>';
while ($hasil = mysql_fetch_assoc($querys)) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $hasil["username"] . '</td>
                <td>' . $hasil["password"] . '</td>
                <td>' . $hasil["nama_lengkap"] . '</td>
                <td>' . $hasil["level"] . '</td>
                </tr>';
};
$html .= '</table>
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Bukti Peminjaman.pdf', 'I');
