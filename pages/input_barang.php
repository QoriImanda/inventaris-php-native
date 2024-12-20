<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Barang Baru</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="pages/proses_barang.php?aksi=tambah" method="post" enctype="multipart/form-data">
            <div id="input-panels">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Input Barang
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kode_barang[]" value="<?= $hasilkode ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" placeholder="Masukan Nama Barang" name="nama_barang[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row" style="margin: 20px;">
                        <div class="col-md-6 col-xs-12">
                            <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff; margin-right: 10px;">Submit</button>
                            <a href='?page=data_barang' class="btn btn-default">Batal</a>
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let hasilkode = "<?php echo $hasilkode; ?>";
        let nilaikode = hasilkode.substring(1);
        let kode = parseInt(nilaikode, 10);

        const addBtn = document.getElementById('add-btn');
        const removeBtn = document.getElementById('remove-btn');
        const inputPanels = document.getElementById('input-panels');

        let inputCount = 1;

        addBtn.addEventListener('click', function() {
            kode += 1;
            const newInput = `
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kode_barang[]" value="B${String(kode).padStart(3, '0')}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" placeholder="Masukan Nama Barang" name="nama_barang[]" class="form-control" required>
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
                kode -= 1;
            }
        });
    });
</script>