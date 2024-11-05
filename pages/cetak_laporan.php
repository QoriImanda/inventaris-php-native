<?php
require_once 'vendor/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$cetakLaporan = $_GET['barang'];

// var_dump($_POST['tgl_mulai']);
// echo '<pre>';
// echo json_encode($_POST, JSON_PRETTY_PRINT);
// echo '</pre>';

if ($cetakLaporan == 'masuk') {
    $data = $db->cetakLaporanBarangMasuk($_POST['tgl_mulai'], $_POST['tgl_akhir']);
} elseif ($cetakLaporan == 'keluar') {
    $data = $db->cetakLaporanBarangKeluar($_POST['tgl_mulai'], $_POST['tgl_akhir']);
}

$tgl_mulai = $_POST['tgl_mulai'];
$tgl_akhir = $_POST['tgl_akhir'];

$date_mulai = DateTime::createFromFormat('Y-m-d', $tgl_mulai);
$date_akhir = DateTime::createFromFormat('Y-m-d', $tgl_akhir);

setlocale(LC_TIME, 'id_ID.UTF-8'); 

$formatted_tgl_mulai = strftime('%d %B %Y', $date_mulai->getTimestamp());
$formatted_tgl_akhir = strftime('%d %B %Y', $date_akhir->getTimestamp());

// var_dump($data);

if ($data == null) {
    $html = '
    <h4>Data tidak ada</h4>
';
} else {
    $html = '
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cetak Laporan</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    color: #333;
                }
                h2 {
                    text-align: center;
                    color: #444;
                    font-size: 2em;
                    margin-bottom: 10px;
                }
                .date {
                    font-size: 1em;
                    color: #666;
                    margin-top: 10px;
                    text-align: center;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                    border: 1px solid #ddd;
                    font-size: 1em;
                }
                th {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <h2>Laporan Barang ' . htmlspecialchars($cetakLaporan) . '</h2>
            <p class="date">Tanggal: ' . $formatted_tgl_mulai . ' - ' . $formatted_tgl_akhir . '</p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>';

    $no = 1;
    foreach ($data as $row) {
        $jumlah = $row['jumlah_brg'] ?? $row['jumlah_keluar']; // Ambil jumlah_barang atau jumlah_keluar jika ada
        $tgl = $row['tgl_masuk'] ?? $row['tgl_keluar'];
        $html .= '
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . htmlspecialchars($row['nama_barang']) . '</td>
                        <td>' . htmlspecialchars($jumlah) . '</td>
                        <td>' . date('d-m-Y', strtotime($tgl)) . '</td>
                    </tr>';
    }


    $html .= '
                </tbody>
            </table>
        </body>
    </html>
';
}

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("laporan_penjualan.pdf", array("Attachment" => 0));  // 0 untuk menampilkan di browser, 1 untuk mendownload
