<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Barang Keluar</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Barang Keluar
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="pages/proses_barang.php?aksi=tambahdatapinjam" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="nama_barang" class="form-control" required>

                                    <option value="">Pilih Nama Barang</option>
                                    <?php
                                    foreach ($db->barang() as $brg) {
                                    ?>
                                        <option value="<?= $brg['nama_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Barang</label>
                                <input type="text" placeholder="Jumlah Barang" name="jumlah_pinjam" class="form-control" required pattern="[0-9]+">
                            </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" placeholder="Tanggal Keluar" name="tgl_pinjam" class="form-control" required>
                        </div>



                        <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                        <a href='?page=databarang' class="btn btn-default">Batal</a>
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