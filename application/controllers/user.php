<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['title'] = 'User';
		$data['user'] = $this->user_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['title'] = 'User';
        
		$this->load->view('templates/header', $data);
		$this->load->view('user/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'User';
		$where = array('id_user'=>$id);
		$data['user'] = $this->user_model->detail_data($where, 'user')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('user/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'User';

	$where = array('id_user'=>$id);
	$data['data'] = $this->user_model->detail_data($where, 'user')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('user/detail');
    $this->load->view('templates/footer');
  }

	public function proses_hapus($id)
	{
		$where = array('id_user' => $id );
		$foto = $this->user_model->ambilFoto($where);
		if($foto){
			if($foto == 'user.png'){

			}else{
				unlink('./assets/upload/pengguna/'.$foto.'');
			}
			
			$this->user_model->hapus_data($where, 'user');
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
		redirect('user');
	}
	
	public function proses_tambah()
	{
		
		$config['upload_path']   = './assets/upload/pengguna/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->user_model->buat_kode(); 
		$namaL = $this->input->post('namaL');
		$user = $this->input->post('user');
		$notelp = $this->input->post('notelp');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$pass = $this->input->post('pwd');
		$status = "Aktif";
	
	
		if ($namaFile == '') {
		  	$ganti = 'user.png';
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
		  	redirect('user/tambah');
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
	
	
			}

		}

		$data=array(
			'id_user'=>$kode,
			'nama'=>$namaL,
			'username'=>$user,
			'notelp'=>$notelp,
			'email'=>$email,
			'level'=>$level,
			'password'=>md5($pass),
			'status'=>$status,
			'foto'=>$ganti
				);
	  
		  $this->user_model->tambah_data($data, 'user');
		  $this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		  redirect('user');

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
			  if($flama !== 'user.png'){
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
		  redirect('user');
	}
    

    

}