<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis</h1>
        <a href="" data-toggle="modal" data-target="#form" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>


    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($jenis as $j) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td>
                                    <?php if($j->nama_jenis == ''): ?>
                                    <i> (Tidak diisi) </i>
                                    <?php else: ?>
                                    <?= $j->nama_jenis ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($j->ket == ''): ?>
                                    <i> (Tidak diisi) </i>
                                    <?php else: ?>
                                    <?= $j->ket ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#formU"
                                        onclick="ambilData('<?= $j->id_jenis ?>')"
                                        class="btn btn-circle btn-success btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" onclick="konfirmasi('<?= $j->id_jenis ?>')"
                                        class="btn btn-circle btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- form input -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>jenis/proses_tambah" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Jenis</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama Jenis -->
                    <div class="form-group"><label>Nama Jenis</label>
                        <input class="form-control" name="jenis" type="text" placeholder="">
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group"><label>Keterangan</label>
                        <textarea class="form-control" name="ket"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Data</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Batal</span>
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>

<!-- form ubah -->
<div class="modal fade" id="formU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>jenis/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Jenis</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama Jenis -->
                    <div class="form-group"><label>Nama Jenis</label>
                        <input type="hidden" id="idjenis" name="idjenis">
                        <input class="form-control" name="jenis" id="jenis" type="text" placeholder="">
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group"><label>Keterangan</label>
                        <textarea class="form-control" name="ket" id="ket"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Perubahan</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jenis.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formjenis.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
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