<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('supplier_model');
  }
	
	public function index()
	{
		$data['title'] = 'Supplier';
		$data['supplier'] = $this->supplier_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('supplier/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->supplier_model->buat_kode();
		$supplier = $this->input->post('supplier');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'id_supplier'=> $kode,
			'nama_supplier'=> $supplier,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$this->supplier_model->tambah_data($data, 'supplier');
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
    	redirect('supplier');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('idsupplier');
		$supplier = $this->input->post('supplier');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'nama_supplier'=> $supplier,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$where = array(
			'id_supplier'=>$kode
		);

		$this->supplier_model->ubah_data($where, $data, 'supplier');
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
    	redirect('supplier');
	}

	public function proses_hapus($id)
	{
		$where = array('id_supplier' => $id );
		$this->supplier_model->hapus_data($where, 'supplier');
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
		redirect('supplier');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_supplier' => $id );
    	$data = $this->supplier_model->detail_data($where, 'supplier')->result();
    	echo json_encode($data);
	}

}
