<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Barang </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Barang Masuk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="table" class="display nowrap" style="width:100%">
                    <thead>
                        <?php
                        if (is_array($db->tampil_barangmasuk()) && count($db->tampil_barangmasuk()) > 0) {

                        ?>
                            <tr>
                                <th>No</th>
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