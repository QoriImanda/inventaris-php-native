<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Stok</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="stok/cetak_stok.php" target="_blank" class="btn btn-default"><i class="fa fa-print "></i> Print </a>
            </div>
        </div>

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stok Barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="table" class="display nowrap" style="width:100%">
                    <thead>
                        <?php
                        ?>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang Masuk</th>
                            <th>Jumlah Barang Keluar</th>
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
                                    <td><?= $row['kode_barang'] ?></td>
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['jml_barangmasuk'] ?></td>
                                    <td><?= $row['jml_barangkeluar'] ?></td>
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
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<script>
    new DataTable('#table', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>