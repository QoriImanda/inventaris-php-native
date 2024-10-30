<?php
include '../config/Class_Stok.php';
$db = new Class_Stok();

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Report</title>
    <style>
        .header {
            text-align: center;
        }

        .header h1 {
            text-align: left;
        }

        .header p {
            text-align: left;
        }

        .footer {
            text-align: right;
            margin-top: 90px;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
        }

        table.grid th,
        table.grid td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        table.grid th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAPORAN DATA SRC CIK IRAT</h1>
        <p>Muara uway, Kec. Bangkinang, Kabupaten Kampar, Riau</p>
        <h2>Cetak Stok</h2>
    </div>
    <table class="grid">
        <tr>
            <th width="5%">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang Masuk</th>
            <th>Jumlah Barang Keluar</th>
            <th>Total Barang Saat Ini Tersedia</th>
        </tr>
        <?php
        $date = date("d-m-Y");
        $no = 1;
        foreach ($db->tampil_data() as $row) {
        ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $row['kode_barang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td align="right"><?= $row['jml_barangmasuk'] ?></td>
                <td align="right"><?= $row['jml_barangkeluar'] ?></td>
                <td align="right"><?= $row['jumlah_brg'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="footer">
        <div>Dusun Uway, <?= $date ?></div>
        <div><?= $_SESSION['username'] ?></div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>