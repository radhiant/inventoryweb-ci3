<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>barangMasuk/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>barang_masuk" class="btn btn-md btn-circle btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Barang Masuk</h1>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Barang Masuk</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Transaksi -->
                            <div class="form-group"><label>ID Barang Masuk</label>
                                <input class="form-control" name="idbm" value="<?= $kode ?>" type="text" placeholder=""
                                    autocomplete="off" readonly>
                            </div>

                            <!-- Tgl Masuk -->
                            <div class="form-group"><label>Tanggal Masuk</label>
                                <input class="form-control" name="tgl" id="datepicker" value="<?= $tglnow ?>" type="text" placeholder=""
                                    autocomplete="off">
                            </div>

                            <!-- opsi barang -->
                            <?php if($jmlbarang > 0): ?>
                            <div class="form-group"><label>Barang</label>
                                <select name="barang" class="form-control chosen" onchange="ambilBarang()">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($barang as $b): ?>
                                    <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Barang</label>
                                <input type="hidden" name="barang">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Barang!)</i></span>
                                    <a href="<?= base_url() ?>barang" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- opsi Supplier -->
                            <?php if($jmlsupplier > 0): ?>
                            <div class="form-group"><label>Supplier</label>
                                <select name="supplier" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($supplier as $s): ?>
                                    <option value="<?= $s->id_supplier ?>"><?= $s->nama_supplier ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Supplier</label>
                                <input type="hidden" name="supplier">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data supplier!)</i></span>
                                    <a href="<?= base_url() ?>supplier" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Jumlah Barang -->
                            <div class="form-group"><label>Jumlah Masuk</label>
                                <input class="form-control" name="jmlbarang" type="number" placeholder="">
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Preview</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <center>
                                <img id="preview" width="200px" src="<?= base_url() ?>assets/upload/barang/box.png"
                                    alt="">
                            </center>

                            <br>

                            <label><b>Nama Barang</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="judul">-</h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <label><b>Stok Barang</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="stok">-</h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barangMasuk.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarangmasuk.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});

$('#datepicker').datepicker({
    autoclose: true
});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {

    })
});
</script>
<?php endif; ?>