<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cetak Laporan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row" style="margin: 20px;">
                    <div class="col-md-6 col-xs-12">
                        <?php
                        // PHP arrays for report types
                        $cetakLaporanMasuk = [
                            'title' => 'Cetak Laporan Barang Masuk',
                            'typeCetak' => 'masuk'
                        ];
                        $cetakLaporanKeluar = [
                            'title' => 'Cetak Laporan Barang Keluar',
                            'typeCetak' => 'keluar'
                        ];
                        ?>
                        <!-- Pass the JSON encoded array as a string to data-bs-whatever -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-bs-whatever='<?php echo json_encode($cetakLaporanMasuk); ?>'>Barang Masuk</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-bs-whatever='<?php echo json_encode($cetakLaporanKeluar); ?>'>Barang Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="reportForm" target="_blank" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Dari</label>
                                    <input type="date" name="tgl_mulai" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const data = JSON.parse(button.getAttribute('data-bs-whatever')); // Parse the data from the button's data-bs-whatever attribute

        // Update modal title with dynamic data
        const modalTitle = data.title;
        const modal = $(this);
        modal.find('.modal-title').text(modalTitle);

        // Update form action dynamically with the correct report type
        const formAction = `?barang=${data.typeCetak}&page=cetaklaporan`;
        modal.find('form').attr('action', formAction);
    });
</script>