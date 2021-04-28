<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('barang_model');
	$this->load->model('jenis_model');
	$this->load->model('satuan_model');
  }
	
	public function index()
	{
		$data['title'] = 'Barang';
		$data['barang'] = $this->barang_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index');
		$this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['title'] = 'Barang';
        
        //data untuk select
		$data['jenis'] = $this->jenis_model->data()->result();
        $data['satuan'] = $this->satuan_model->data()->result();

        //jml
		$data['jmlJenis'] = $this->satuan_model->data()->num_rows();
		$data['jmlSatuan'] = $this->satuan_model->data()->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_tambah');
		$this->load->view('templates/footer');
    }
    
    public function ubah($id)
	{
        $data['title'] = 'Barang';

        //menampilkan data berdasarkan id
		$where = array('id_barang'=>$id);
        $data['data'] = $this->barang_model->detail_data($where, 'barang')->result();
        
        //data untuk select
		$data['jenis'] = $this->jenis_model->data()->result();
        $data['satuan'] = $this->satuan_model->data()->result();

        //jml
		$data['jmlJenis'] = $this->satuan_model->data()->num_rows();
		$data['jmlSatuan'] = $this->satuan_model->data()->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Barang';

        //menampilkan data berdasarkan id
        $data['data'] = $this->barang_model->detail_join($id, 'barang')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{

        $config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

        $this->load->library('upload', $config);
        
		$kode = 	$this->barang_model->buat_kode();
		$barang = $this->input->post('barang');
		$stok = 	$this->input->post('stok');
		$jenis = 	$this->input->post('jenis');
        $satuan = 	$this->input->post('satuan');
        
        if ($namaFile == '') {
            $ganti = 'box.png';
        }else{
          if (! $this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            redirect('barang/tambah');
          }
          else{
  
            $data = array('photo' => $this->upload->data());
            $nama_file= $data['photo']['file_name'];
            $ganti = str_replace(" ", "_", $nama_file);
  
  
          }

      }
		
		$data=array(
			'id_barang'=> $kode,
			'nama_barang'=> $barang,
			'stok'=> $stok,
			'id_jenis'=> $jenis,
            'id_satuan'=> $satuan,
            'foto' => $ganti
		);

		$this->barang_model->tambah_data($data, 'barang');
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
    	redirect('barang');
	}

	public function proses_ubah()
	{
        $config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

        $this->load->library('upload', $config);
        
		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$stok = 	$this->input->post('stok');
		$jenis = 	$this->input->post('jenis');
        $satuan = 	$this->input->post('satuan');
        
        $flama = $this->input->post('fotoLama');

        if ($namaFile == '') {
            $ganti = $flama;
        }else{
          if (! $this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            redirect('barang/ubah/'.$kode);
          }
          else{
  
            $data = array('photo' => $this->upload->data());
            $nama_file= $data['photo']['file_name'];
            $ganti = str_replace(" ", "_", $nama_file);
            if($flama == 'box.png'){

            }else{
              unlink('./assets/upload/barang/'.$flama.'');
            }
  
          }

      }
		
		$data=array(
			'nama_barang'=> $barang,
			'stok'=> $stok,
			'id_jenis'=> $jenis,
            'id_satuan'=> $satuan,
            'foto' => $ganti
		);

		$where = array(
			'id_barang'=>$kode
		);

		$this->barang_model->ubah_data($where, $data, 'barang');
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
    	redirect('barang');
	}

	public function proses_hapus($id)
	{
		$where = array('id_barang' => $id );
		$foto = $this->barang_model->ambilFoto($where);
		if($foto){
			if($foto == 'box.png'){

			}else{
				unlink('./assets/upload/barang/'.$foto.'');
			}
			
			$this->barang_model->hapus_data($where, 'barang');
		}

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
		redirect('barang');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_barang' => $id );
    	$data = $this->barang_model->detail_data($where, 'barang')->result();
    	echo json_encode($data);
	}

}
