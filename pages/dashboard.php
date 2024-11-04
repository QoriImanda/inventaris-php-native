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
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Barang Masuk
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
                Barang Keluar
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
</script>