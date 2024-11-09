<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php

function jumlah_stok()
{
    include("./config/config.php");

    $sql = "select * from tbl_barang";

    $data = mysqli_query($koneksi, $sql);

    $data1 = mysqli_num_rows($data);
    if ($data1 == 0) {

        // echo "<div class='alert alert-danger'>Tidak ada data</div>";
    } else {

        while ($d = mysqli_fetch_assoc($data)) {

            $brg[] = $d['jumlah_brg'];
        }

        $jumlah = array_sum($brg);

        return $jumlah;
    }
}

function jumlah_barangK()
{
    include("./config/config.php");

    $sql = "select * from tbl_keluarbarang";

    $data = mysqli_query($koneksi, $sql);

    $data1 = mysqli_num_rows($data);
    if ($data1 == 0) {

        // echo "<div class='alert alert-danger'>Tidak ada data</div>";
    } else {

        while ($d = mysqli_fetch_assoc($data)) {

            $brg[] = $d['jumlah_keluar'];
        }

        $jumlah = array_sum($brg);

        return $jumlah;
    }
}

function jumlah_barangM()
{
    include("./config/config.php");

    $sql = "select * from tbl_masukbarang";

    $data = mysqli_query($koneksi, $sql);

    $data1 = mysqli_num_rows($data);
    if ($data1 == 0) {

        // echo "<div class='alert alert-danger'>Tidak ada data</div>";
    } else {

        while ($d = mysqli_fetch_assoc($data)) {

            $brg[] = $d['jumlah_masuk'];
        }

        $jumlah = array_sum($brg);

        return $jumlah;
    }
}

function chartDataTerlarisTahun()
{
    include("./config/config.php");

    // Mengambil tahun berdasarkan zona waktu server
    $tahun = date("Y");  // Mengambil tahun saat ini

    // SQL query untuk menarik data barang keluar per bulan dan mengurutkannya berdasarkan jumlah keluar terbanyak
    $sql = "SELECT kode_barang, nama_barang, 
                   SUM(jumlah_keluar) AS total_keluar, 
                   MONTH(tgl_keluar) AS bulan, YEAR(tgl_keluar) AS tahun
            FROM tbl_keluarbarang
            WHERE YEAR(tgl_keluar) = ?
            GROUP BY kode_barang, nama_barang, bulan, tahun
            ORDER BY bulan, total_keluar DESC"; // Mengurutkan berdasarkan bulan dan total keluar

    // Menyiapkan statement SQL untuk menghindari SQL injection
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tahun);

    // Eksekusi query
    mysqli_stmt_execute($stmt);

    // Menyimpan hasil query
    $result = mysqli_stmt_get_result($stmt);

    // Mengecek apakah ada data yang ditemukan
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Menambahkan data barang per bulan
        $data[] = [
            'kode_barang' => $row['kode_barang'],
            'nama_barang' => $row['nama_barang'],
            'total_keluar' => $row['total_keluar'],
            'bulan' => $row['bulan']
        ];
    }

    // Mengembalikan data dalam format JSON
    return json_encode($data);
}

// Mendapatkan data barang terlaris dan menyimpannya dalam variabel
$chartData = chartDataTerlarisTahun();

?>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-truck fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?= jumlah_stok(); ?></div>
                        <div>Stok!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=datastok">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sign-in fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?= jumlah_barangM(); ?></div>
                        <div>Barang Masuk!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=barangmasuk">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sign-out fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= jumlah_barangK(); ?></div>
                        <div>Barang Keluar!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=barangkeluar">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div> <!-- /.row -->

<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-default">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stok Barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="stok_barang" class="display nowrap" style="width:100%">
                    <thead>
                        <?php
                        ?>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Total Barang Saat Ini Tersedia</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        if (is_array($st->tampil_data()) && count($st->tampil_data()) > 0) {

                            foreach ($st->tampil_data() as $row) {

                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_barang'] ?>
                                        <?php if ($row['jumlah_brg'] <= '20'){ ?>
                                        <span class="badge" style="background-color: orange; color: black;">Stok Menipis</span>
                                        <?php }?>
                                    </td>
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['jumlah_brg'] ?></td>
                                    <!-- <td><a href="?id=<?= $row['kode_barang'] ?>&page=update">Edit</a> - <a href="?hapus&id=<?= $row['kode_barang'] ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a></td> -->
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div> <!-- /.row -->

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Barang Masuk Seminggu Terakhir
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="barang_masuk" class="display nowrap" style="width:100%">
                    <thead>
                        <?php
                        if (is_array($db->tampil_barangmasuk_view_in_dashboard()) && count($db->tampil_barangmasuk_view_in_dashboard()) > 0) {
                        ?>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>Kode</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;

                            foreach ($db->tampil_barangmasuk_view_in_dashboard() as $row) {

                        ?>
                            <tr>
                                <!-- <td><?= $no++ ?></td> -->
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['jumlah_masuk'] ?></td>
                                <td><?= $row['tgl_masuk'] ?></td>
                                <td><?= $row['nama_supplier'] ?></td>
                            </tr>
                    <?php }
                        } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Barang Keluar Seminggu Terakhir
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="barang_keluar" class="display nowrap" style="width:100%">
                    <thead>
                        <?php
                        if (is_array($db->tampil_barangkeluar_view_in_dashboard()) && count($db->tampil_barangkeluar_view_in_dashboard()) > 0) {
                        ?>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>Kode</th>
                                <th>barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($db->tampil_barangkeluar_view_in_dashboard() as $row) {
                        ?>
                            <tr>
                                <!-- <td><?= $no++ ?></td> -->
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['jumlah_keluar'] ?></td>
                                <td><?= $row['tgl_keluar'] ?></td>
                            </tr>
                    <?php }
                        } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div> <!-- /.row -->

<script>
    new DataTable('#barang_masuk', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });

    new DataTable('#barang_keluar', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });

    new DataTable('#stok_barang', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>

<script>
    // Data PHP yang diterima di JavaScript
    const chartData = <?php echo $chartData; ?>;

    // Menyiapkan label bulan
    const bulanLabels = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Array untuk menyimpan total keluar tiap bulan
    const totalKeluarData = new Array(12).fill(0); // Inisialisasi array dengan 0 untuk setiap bulan

    // Array untuk menyimpan barang terlaris per bulan
    const bulanBarang = new Array(12).fill(null).map(() => []); // Gunakan .map(() => []) untuk membuat array terpisah

    // Mengelompokkan dan menjumlahkan data berdasarkan bulan
    chartData.forEach(item => {
        const bulanIndex = item.bulan - 1; // Mengubah bulan (1-12) menjadi indeks array (0-11)

        // Mengonversi total_keluar ke angka (jika perlu)
        const totalKeluar = parseInt(item.total_keluar, 10); // pastikan item.total_keluar adalah angka

        // Menambahkan jumlah keluar barang ke total keluar per bulan
        totalKeluarData[bulanIndex] += totalKeluar;

        // Menambahkan data barang ke bulan yang sesuai
        bulanBarang[bulanIndex].push({
            nama_barang: item.nama_barang,
            total_keluar: totalKeluar
        });
    });

    // Mendapatkan konteks dari canvas untuk Chart.js
    const ctx = document.getElementById('myChart').getContext('2d');

    // Membuat grafik menggunakan Chart.js
    new Chart(ctx, {
        type: 'bar', // Jenis grafik: bar (batang)
        data: {
            labels: bulanLabels, // Label bulan
            datasets: [{
                label: 'Total Barang Keluar per Bulan',
                data: totalKeluarData, // Data total keluar per bulan
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang batang
                borderColor: 'rgba(54, 162, 235, 1)', // Warna batas batang
                borderWidth: 1 // Ketebalan batas batang
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true, // Memulai sumbu Y dari 0
                    ticks: {
                        // Format angka pada sumbu Y agar lebih mudah dibaca
                        callback: function(value) {
                            // Format angka sebagai ribuan, juta, dsb.
                            if (value >= 1000000) {
                                return value / 1000000 + 'M';
                            } else if (value >= 1000) {
                                return value / 1000 + 'K';
                            }
                            return value;
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const bulanIndex = tooltipItem.dataIndex;
                            const barangData = bulanBarang[bulanIndex];

                            // Mengambil barang terlaris per bulan
                            let terlaris = '';
                            if (barangData.length > 0) {
                                // Mengurutkan barang berdasarkan total keluar (terlaris)
                                barangData.sort((a, b) => b.total_keluar - a.total_keluar);
                                const barang = barangData[0]; // Barang yang paling banyak keluar
                                terlaris = barang.nama_barang + ' (' + barang.total_keluar + ' items)';
                            }

                            // Menggunakan template literal yang benar di sini
                            return `${bulanLabels[bulanIndex]}: ${totalKeluarData[bulanIndex]} barang keluar\nBarang Terlaris: ${terlaris}`;
                        }
                    }
                }
            }
        }
    });
</script>