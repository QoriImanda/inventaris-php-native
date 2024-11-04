<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Barang Keluar</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form action="pages/proses_barang.php?aksi=tambahdatapinjam" method="post" enctype="multipart/form-data">
            <div id="input-panels">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Barang Keluar</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="nama_barang[]" class="form-control" required>
                                        <option value="">Pilih Nama Barang</option>
                                        <?php foreach ($db->barang() as $brg): ?>
                                            <option value="<?= htmlspecialchars($brg['nama_barang']) ?>"><?= htmlspecialchars($brg['nama_barang']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Barang</label>
                                    <input type="text" placeholder="Jumlah Barang" name="jumlah_pinjam[]" class="form-control" required pattern="[0-9]+">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tanggal Keluar</label>
                                    <input type="date" placeholder="Tanggal Keluar" name="tgl_pinjam[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row" style="margin: 20px;">
                        <div class="col-md-6 col-xs-12">
                            <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                            <a href='?page=databarang' class="btn btn-default">Batal</a>
                        </div>
                        <div class="col-md-6 col-xs-12 text-right">
                            <button type="button" class="btn btn-danger" id="remove-btn" style="margin-right: 10px;">-</button>
                            <button type="button" class="btn btn-primary" id="add-btn">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addBtn = document.getElementById('add-btn');
        const removeBtn = document.getElementById('remove-btn');
        const inputPanels = document.getElementById('input-panels');

        addBtn.addEventListener('click', function() {
            const newInput = `
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="nama_barang[]" class="form-control" required>
                                        <option value="">Pilih Nama Barang</option>
                                        <?php foreach ($db->barang() as $brg): ?>
                                            <option value="<?= htmlspecialchars($brg['nama_barang']) ?>"><?= htmlspecialchars($brg['nama_barang']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Barang</label>
                                    <input type="text" placeholder="Jumlah Barang" name="jumlah_pinjam[]" class="form-control" required pattern="[0-9]+">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tanggal Keluar</label>
                                    <input type="date" placeholder="Tanggal Keluar" name="tgl_pinjam[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            inputPanels.insertAdjacentHTML('beforeend', newInput);
        });

        removeBtn.addEventListener('click', function() {
            const panels = inputPanels.getElementsByClassName('panel');
            if (panels.length > 1) {
                inputPanels.removeChild(panels[panels.length - 1]);
            }
        });
    });
</script>
