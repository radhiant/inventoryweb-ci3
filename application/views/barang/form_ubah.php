<?php foreach ($data as $d): ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>barang/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>barang" class="btn btn-md btn-circle btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Barang</h1>
            </div>
            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Barang -->
                            <div class="form-group"><label>ID Barang</label>
                                <input class="form-control" name="idbarang" type="text" value="<?= $d->id_barang ?>" readonly>
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group"><label>Nama Barang</label>
                                <input class="form-control" name="barang" type="text" value="<?= $d->nama_barang ?>">
                            </div>

                            <!-- Stok -->
                            <div class="form-group"><label>Stok Awal</label>
                                <input class="form-control" name="stok" type="number" value="<?= $d->stok ?>">
                            </div>

                            <!-- Jenis -->
                            <?php if($jmlJenis > 0): ?>
                            <div class="form-group"><label>Jenis Barang</label>
                                <select name="jenis" class="form-control chosen">
                                    <?php foreach($jenis as $j): ?>

                                    <?php if($d->id_jenis == $j->id_jenis): ?>
                                    <option value="<?= $j->id_jenis ?>" selected><?= $j->nama_jenis ?></option>
                                    <?php else: ?>
                                    <option value="<?= $j->id_jenis ?>"><?= $j->nama_jenis ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Jenis Barang</label>
                                <input type="hidden" name="jenis">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Jenis!)</i></span>
                                    <a href="<?= base_url() ?>jenis" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                             <!-- Satuan -->
                             <?php if($jmlSatuan > 0): ?>
                            <div class="form-group"><label>Satuan Barang</label>
                                <select name="satuan" class="form-control chosen">
                                    <?php foreach($satuan as $s): ?>

                                    <?php if($d->id_satuan == $s->id_satuan): ?>
                                    <option value="<?= $s->id_satuan ?>" selected><?= $s->nama_satuan ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_satuan ?>"><?= $s->nama_satuan ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Satuan Barang</label>
                                <input type="hidden" name="satuan">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Satuan!)</i></span>
                                    <a href="<?= base_url() ?>satuan" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>

                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" id="outputImg"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $d->foto ?>">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
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
<script src="<?= base_url(); ?>assets/js/barang.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarang.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

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

<?php endforeach; ?>