<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('supplier_model');
	$this->load->model('barang_model');
	$this->load->model('barangMasuk_model');
  }
	
	public function index()
	{
		$data['title'] = 'Barang Masuk';
		$data['bm'] = $this->barangMasuk_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Barang Masuk';

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/laporan');
		$this->load->view('templates/footer');
	}

	public function getBarangMasuk()
	{
    	$data = $this->barangMasuk_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filterBarangMasuk($tglawal, $tglakhir)
	{
      	$data = $this->barangMasuk_model->lapdata($tglawal, $tglakhir)->result();
    	echo json_encode($data);
	}


	public function getBarang()
	{
		$id = $this->input->post('id');
    	$where = array('id_barang' => $id );
    	$data = $this->barang_model->detail_data($where, 'barang')->result();
    	echo json_encode($data);
	}

	public function getTotalStok()
	{
		$id = $this->input->post('id');
		$where = array('id_barang'=>$id);
    	$data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->where($where)->get();
        $data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->where($where)->get();
		$bm = $data->row();
		$bk = $data2->row();
		$hasil = intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar);
		$total = array('total'=>$hasil);
		echo json_encode($total);
	}

	public function proses_hapus($id,$jml,$idb)
	{
		$where = array('id_barang_masuk'=>$id);
		$this->barang_model->hapus_data($where, 'barang_masuk');


		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('barang_masuk');
	}

	public function tambah()
	{
        $data['title'] = 'Barang Masuk';

        $data['kode'] = $this->barangMasuk_model->buat_kode();
        
		$data['barang'] = $this->barang_model->data()->result();
        $data['jmlbarang'] = $this->barang_model->data()->num_rows();
        
        $data['supplier'] = $this->supplier_model->data()->result();
        $data['jmlsupplier'] = $this->supplier_model->data()->num_rows();
        
		$data['tglnow'] = date('m/d/Y');

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Barang Masuk';
		$data['supplier'] = $this->supplier_model->data()->result();
		$data['jmlsupplier'] = $this->supplier_model->data()->num_rows();

		//menampilkan data berdasarkan id
		$data['data'] = $this->barangMasuk_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/form_ubah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
        $kode = $this->input->post('idbm');
        $tgl = $this->input->post('tgl');
		$barang = $this->input->post('barang');
		$supplier = $this->input->post('supplier');
        $jmlmasuk = $this->input->post('jmlbarang');
        $usrinput = $this->session->userdata('login_session')['id_user'];

		$explode = explode("/", $tgl);
      	$tglmasuk = $explode[2].'-'.$explode[0].'-'.$explode[1];

		
		$data=array(
			'id_barang_masuk'=>$kode,
			'id_barang'=> $barang,
			'id_supplier'=>$supplier,
			'jumlah_masuk'=>$jmlmasuk,
            'tgl_masuk'=>$tglmasuk,
            'id_user'=>$usrinput
		);

		$where = array('id_barang' => $barang);

		$this->barangMasuk_model->tambah_data($data, 'barang_masuk');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('barang_masuk');
	}
	

	public function proses_ubah()
	{
		$kode = $this->input->post('idbm');
		$barang = $this->input->post('barang');
		$supplier = $this->input->post('supplier');
		$tgl = $this->input->post('tgl');
		$jmlmasuk = $this->input->post('jmlmasuk');
		$jmlmasuklama = $this->input->post('jmlmasuklama');

		$explode = explode("/", $tgl);
      	$tglmasuk = $explode[2].'-'.$explode[0].'-'.$explode[1];
		
		$data=array(
			'id_barang'=> $barang,
			'id_supplier'=>$supplier,
			'jumlah_masuk'=>$jmlmasuk,
			'tgl_masuk'=>$tglmasuk
		);
		$where = array('id_barang_masuk'=>$kode);

		$this->barangMasuk_model->ubah_data($where, $data, 'barang_masuk');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('barang_masuk');
	}

	
}
