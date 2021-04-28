<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
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
                                <th width="1%">No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>No.Telepon</th>
                                <th>Alamat</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($supplier as $s) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $s->id_supplier ?></td>
                                <td><?= $s->nama_supplier ?></td>
                                <td><?= $s->notelp ?></td>
                                <td><?= $s->alamat ?></td>
                                <td>
                                    <center>
                                        <a href="#" data-toggle="modal" data-target="#formU"
                                            onclick="ambilData('<?= $s->id_supplier ?>')"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $s->id_supplier ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
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
    <form action="<?= base_url() ?>supplier/proses_tambah" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Supplier</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama Supplier -->
                    <div class="form-group"><label>Nama Supplier</label>
                        <input class="form-control" name="supplier" type="text" placeholder="">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group"><label>Nomor Telepon</label>
                        <input class="form-control" name="notelp" type="number" placeholder="">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group"><label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
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
    <form action="<?= base_url() ?>supplier/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Supplier</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Id Supplier -->
                    <div class="form-group"><label>ID Supplier</label>
                        <input class="form-control" name="idsupplier" type="text" id="idsupplier" readonly>
                    </div>

                    <!-- Nama Supplier -->
                    <div class="form-group"><label>Nama Supplier</label>
                        <input class="form-control" name="supplier" type="text" id="supplier">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group"><label>Nomor Telepon</label>
                        <input class="form-control" name="notelp" type="number" id="notelp">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group"><label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
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
<script src="<?= base_url(); ?>assets/js/supplier.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formsupplier.js"></script>

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