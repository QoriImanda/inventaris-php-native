<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Laporan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row" style="margin: 20px;">
                    <div class="col-md-6 col-xs-12">
                        <a href='?page=cetaklaporan' class="btn btn-default">Barang Masuk</a>
                        <a href='?page=cetaklaporan' class="btn btn-default">Barang Keluar</a>
                    </div>
                </div>
            </div>
        </div>
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