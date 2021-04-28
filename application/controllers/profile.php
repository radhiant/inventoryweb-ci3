<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie'); 
	$this->load->model('user_model'); 
  }
	
	public function index()
	{
		$data['title'] = 'Profile';
		$this->load->view('templates/header', $data);
		$this->load->view('profile/index');
		$this->load->view('templates/footer');
	}

	public function detail_data()
  	{
		$id = $this->input->post('id');

		$where = array('id_user'=>$id);
		$data = $this->user_model->detail_data($where, 'user')->result();

		echo json_encode($data);
  	}

	public function ubah($id)
	{
		$data['title'] = 'Profile';
		$where = array('id_user'=>$id);
		$data['user'] = $this->user_model->detail_data($where, 'user')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('profile/ubah_profil');
		$this->load->view('templates/footer');
	}

	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/pengguna/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->input->post('iduser');
		$namaL = $this->input->post('namaL');
		$user = $this->input->post('user');
		$notelp = $this->input->post('notelp');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$pass = $this->input->post('pwd');
		$passLama = $this->input->post('pwdLama');

		$flama = $this->input->post('fotoLama');

		if($pass == ''){
			$passUpdate = $passLama;
		}else{
			$passUpdate = md5($pass);
		}
	
	
		if ($namaFile == '') {
		  	$ganti = $flama;
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
		  	redirect('user/ubah/'.$kode);
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
			  if($flama !== ''){
				unlink('./assets/upload/pengguna/'.$flama.'');
			  }
	
			}

		}

		$data=array(
			'nama'=>$namaL,
			'username'=>$user,
			'notelp'=>$notelp,
			'email'=>$email,
			'level'=>$level,
			'password'=>$passUpdate,
			'status'=>$status,
			'foto'=>$ganti
				);


		$where = array('id_user'=>$kode);
	  
		  $this->user_model->ubah_data($where, $data, 'user');
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

		  redirect('profile');
	}


}
