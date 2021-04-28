<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Pengguna</h1>
        </div>
        <!-- 
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            -->
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- buku -->
            <div class="card shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/pengguna/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Pengguna</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_user ?></b></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                         <!-- Nama Lengkap -->
                         <div class="form-group"><label>Nama Lengkap</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Username -->
                        <div class="form-group"><label>Username</label>
                            <h4 class="h4 text-gray-800"><?= $d->username ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Nomor Telepon</label>
                            <h4 class="h4 text-gray-800"><?= $d->notelp ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Email -->
                        <div class="form-group"><label>Email</label>
                            <h4 class="h4 text-gray-800"><?= $d->email ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Level -->
                        <div class="form-group"><label>Level</label>
                            <h4 class="h4 text-gray-800"><?= $d->level ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Status -->
                        <div class="form-group"><label>Status</label>
                            <?php if($d->status == "Aktif"): ?>
                            <h4 class="h4 text-success">
                            <?php else: ?>
                            <h4 class="h4 text-gray-800">
                            <?php endif; ?>
                                <?= $d->status ?>
                            </h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                    </div>

                </div>
            </div>

        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>

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