<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 1 = tanggal
	// variabel pecahkan 0 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
        <a href="<?= base_url() ?>barangMasuk/tambah" class="btn btn-sm btn-primary btn-icon-split">
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
                    <table class="table" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>No.Transaksi</th>
                                <th>Tgl Masuk</th>
                                <th>Supplier</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($bm as $bm): ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $bm->id_barang_masuk ?></td>
                                <td><?= tgl_indo($bm->tgl_masuk) ?></td>
                                <td><?= $bm->nama_supplier ?></td>
                                <td><?= $bm->nama_barang ?></td>
                                <td><span class="badge badge-success"> <i class="fa fa-plus"></i> <?= $bm->jumlah_masuk ?></span></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>barangMasuk/ubah/<?= $bm->id_barang_masuk ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#"
                                            onclick="konfirmasi('<?= $bm->id_barang_masuk ?>','<?= $bm->jumlah_masuk ?>','<?= $bm->id_barang ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
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
<script src="<?= base_url(); ?>assets/js/barangMasuk.js"></script>

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