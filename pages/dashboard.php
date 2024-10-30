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
                Data Barang Masuk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="dataTables-example">
                    <thead>
                        <?php
                        if (is_array($db->tampil_barangmasuk()) && count($db->tampil_barangmasuk()) > 0) {
                        ?>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>Supplier</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;

                            foreach ($db->tampil_barangmasuk() as $row) {

                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
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
                Laporan Data Barang Keluar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="dataTables-example">
                    <thead>
                        <?php
                        if (is_array($db->tampil_barangkeluar()) && count($db->tampil_barangkeluar()) > 0) {
                        ?>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah Keluar</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php

                            $no = 1;

                            foreach ($db->tampil_barangkeluar() as $row) {


                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['tgl_keluar'] ?></td>
                                <td><?= $row['jumlah_keluar'] ?></td>
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
