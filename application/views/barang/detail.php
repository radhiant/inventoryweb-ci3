<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>barang" class="btn btn-md btn-circle btn-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Buku</h1>
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
            <!-- Barang -->
            <div class="card shadow border-bottom-secondary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Barang -->
                        <div class="form-group"><label>ID Barang</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_barang ?></b></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nama Barang -->
                        <div class="form-group"><label>Nama Barang</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_barang ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Stok -->
                        <div class="form-group"><label>Stok</label>
                            <?php  
                                $data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->where('id_barang', $d->id_barang)->get();
                                $data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->where('id_barang', $d->id_barang)->get();
                                
                                $bm = $data->row();
                                $bk = $data2->row();
                                $hasil = intval($d->stok) + (intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar));
                                ?>
                            
                            <h4 class="h4 text-gray-800"><?= $hasil ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Jenis Barang -->
                        <div class="form-group"><label>Jenis Barang</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_jenis ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Satuan Barang -->
                        <div class="form-group"><label>Satuan Barang</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_satuan ?></h4>
                        </div>

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

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    $('#pdf').hide();

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