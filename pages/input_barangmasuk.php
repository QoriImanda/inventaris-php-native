<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Barang Masuk
            </div>
            <div class="panel-body">
                <form action="pages/proses_barang.php?aksi=tambahbarangmasuk" method="post" enctype="multipart/form-data">
                    <div id="input-panels">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kode Barang Masuk</label>
                                            <input type="text" placeholder="kode Barang Masuk" name="id_masukbarang[]" class="form-control" required value="<?= $hasilkodemasuk ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Supplier</label>
                                            <select name="nama_supplier[]" class="form-control" required>
                                                <option value="">Pilih Supplier</option>
                                                <?php foreach ($db->supplier() as $sup): ?>
                                                    <option value="<?= $sup['nama_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select name="nama_barang[]" class="form-control" required>
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($db->barang() as $brg): ?>
                                                    <option value="<?= $brg['nama_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jumlah Masuk</label>
                                            <input type="text" placeholder="Masukan jumlah masuk" name="jumlah_masuk[]" class="form-control" required pattern="[0-9]+">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" placeholder="Tanggal Masuk" name="tgl_masuk[]" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.input-panels -->
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
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let kode = parseInt("<?= substr($hasilkodemasuk, 4) ?>", 10); 
        const addBtn = document.getElementById('add-btn');
        const removeBtn = document.getElementById('remove-btn');
        const inputPanels = document.getElementById('input-panels');
        let inputCount = 1;

        addBtn.addEventListener('click', function() {
            kode++;
            const newInput = `
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kode Barang Masuk</label>
                                    <input type="text" name="id_masukbarang[]" value="BMSK${String(kode).padStart(3, '0')}" class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Supplier</label>
                                    <select name="nama_supplier[]" class="form-control" required>
                                        <option value="">Pilih Supplier</option>
                                        <?php foreach ($db->supplier() as $sup): ?>
                                            <option value="<?= $sup['nama_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="nama_barang[]" class="form-control" required>
                                        <option value="">Pilih Barang</option>
                                        <?php foreach ($db->barang() as $brg): ?>
                                            <option value="<?= $brg['nama_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="text" name="jumlah_masuk[]" placeholder="Masukan jumlah masuk" class="form-control" required pattern="[0-9]+">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tgl_masuk[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            inputPanels.insertAdjacentHTML('beforeend', newInput);
            inputCount++;
        });

        removeBtn.addEventListener('click', function() {
            if (inputCount > 1) {
                const panels = inputPanels.getElementsByClassName('panel');
                inputPanels.removeChild(panels[panels.length - 1]);
                inputCount--;
                kode--;
            }
        });
    });
</script>
