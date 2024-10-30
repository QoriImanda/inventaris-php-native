<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Barang Baru</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Barang Baru
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="pages/proses_barang.php?aksi=tambah" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" value="<?= $hasilkode ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" placeholder="Masukan Nama Barang" name="nama_barang" class="form-control" required>
                            </div>

                    </div>
                    <!-- /.col-lg-6 (nested) -->

                    <div class="form-group">
                        <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                        <a href='?page=data_barang' class="btn btn-default">Batal</a>
                    </div>
                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
