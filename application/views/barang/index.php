<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang') : ?>
        <a href="<?= base_url() ?>barang/tambah" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
        <?php endif; ?>

    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang') : ?>
                                <th width="1%">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody">
                            <?php $no=1; foreach ($barang as $b): ?>
                            <tr>
                                <td onclick="detail('<?= $b->id_barang ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $b->id_barang ?>')"><img style="border-radius: 5px;"
                                        src="assets/upload/barang/<?= $b->foto ?>" alt="" width="75px"></td>
                                <td onclick="detail('<?= $b->id_barang ?>')"><?= $b->nama_barang ?></td>
                                <td onclick="detail('<?= $b->id_barang ?>')"><?= $b->nama_jenis ?></td>
                                <td onclick="detail('<?= $b->id_barang ?>')">
                                    <?php  
                                    $data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->where('id_barang', $b->id_barang)->get();
                                    $data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->where('id_barang', $b->id_barang)->get();
                                

                                    $bm = $data->row();
                                    $bk = $data2->row();
                                    $hasil = intval($b->stok) + (intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar));
                                    ?>
                                    <?= $hasil ?>
                                </td>
                                <td onclick="detail('<?= $b->id_barang ?>')"><?= $b->nama_satuan ?></td>
                                <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang') : ?>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>barang/ubah/<?= $b->id_barang ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $b->id_barang ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
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

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barang.js"></script>
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