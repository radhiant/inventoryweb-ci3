<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->helper('cookie');
	$this->load->model('barang_model');
	$this->load->model('supplier_model');
	$this->load->model('user_model');
	$this->load->model('barangMasuk_model');
	$this->load->model('barangKeluar_model');
  }
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jmlbarang'] = $this->barang_model->dataJoin()->num_rows();
		$data['jmlsupplier'] = $this->supplier_model->data()->num_rows();
		$data['jmlStok'] = $this->barang_model->totalStok();
		$data['jmlUser'] = $this->user_model->data()->num_rows();
		$data['bm5Terakhir'] = $this->barangMasuk_model->transaksiTerakhir()->result();
		$data['bk5Terakhir'] = $this->barangKeluar_model->transaksiTerakhir()->result();

		$data['yearnow']=date('Y', strtotime('+0 year'));
		$data['previousyear']=date('Y', strtotime('-1 year'));
		$data['twoyearago']=date('Y', strtotime('-2 year'));

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');

	}

	public function getTotalTransaksi()
	{
		$tahun = $this->input->post('tahun');
		$jmlBM = $this->barangMasuk_model->dataJoinLike($tahun)->num_rows();
		$jmlBK = $this->barangKeluar_model->dataJoinLike($tahun)->num_rows();

		$data = array('jmlbm'=>$jmlBM, 'jmlbk'=>$jmlBK);
		echo json_encode($data);
	}

	public function getFilterTahun()
	{
		$tahun = $this->input->post('tahun');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun.'-'.$januari.'-01'));
		$first_januari = date('Y-m-01', strtotime($tahun.'-'.$januari.'-01'));
		$bmJanuari = $this->barangMasuk_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$bkJanuari = $this->barangKeluar_model->jmlperbulan($first_januari, $last_januari)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun.'-'.$februari.'-01'));
		$first_februari = date('Y-m-01', strtotime($tahun.'-'.$februari.'-01'));
		$bmFebruari = $this->barangMasuk_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$bkFebruari = $this->barangKeluar_model->jmlperbulan($first_februari, $last_februari)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun.'-'.$maret.'-01'));
		$first_maret = date('Y-m-01', strtotime($tahun.'-'.$maret.'-01'));
		$bmMaret = $this->barangMasuk_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$bkMaret = $this->barangKeluar_model->jmlperbulan($first_maret, $last_maret)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun.'-'.$april.'-01'));
		$first_april = date('Y-m-01', strtotime($tahun.'-'.$april.'-01'));
		$bmApril = $this->barangMasuk_model->jmlperbulan($first_april, $last_april)->num_rows();
		$bkApril = $this->barangKeluar_model->jmlperbulan($first_april, $last_april)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun.'-'.$mei.'-01'));
		$first_mei = date('Y-m-01', strtotime($tahun.'-'.$mei.'-01'));
		$bmMei = $this->barangMasuk_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$bkMei = $this->barangKeluar_model->jmlperbulan($first_mei, $last_mei)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun.'-'.$juni.'-01'));
		$first_juni = date('Y-m-01', strtotime($tahun.'-'.$juni.'-01'));
		$bmJuni = $this->barangMasuk_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$bkJuni = $this->barangKeluar_model->jmlperbulan($first_juni, $last_juni)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun.'-'.$juli.'-01'));
		$first_juli = date('Y-m-01', strtotime($tahun.'-'.$juli.'-01'));
		$bmJuli = $this->barangMasuk_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$bkJuli = $this->barangKeluar_model->jmlperbulan($first_juli, $last_juli)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun.'-'.$agustus.'-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun.'-'.$agustus.'-01'));
		$bmAgustus = $this->barangMasuk_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$bkAgustus = $this->barangKeluar_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun.'-'.$september.'-01'));
		$first_september = date('Y-m-01', strtotime($tahun.'-'.$september.'-01'));
		$bmSeptember = $this->barangMasuk_model->jmlperbulan($first_september, $last_september)->num_rows();
		$bkSeptember = $this->barangKeluar_model->jmlperbulan($first_september, $last_september)->num_rows();
		
		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun.'-'.$oktober.'-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun.'-'.$oktober.'-01'));
		$bmOktober = $this->barangMasuk_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$bkOktober = $this->barangKeluar_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun.'-'.$november.'-01'));
		$first_november = date('Y-m-01', strtotime($tahun.'-'.$november.'-01'));
		$bmNovember = $this->barangMasuk_model->jmlperbulan($first_november, $last_november)->num_rows();
		$bkNovember = $this->barangKeluar_model->jmlperbulan($first_november, $last_november)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun.'-'.$desember.'-01'));
		$first_desember = date('Y-m-01', strtotime($tahun.'-'.$desember.'-01'));
		$bmDesember = $this->barangMasuk_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$bkDesember = $this->barangKeluar_model->jmlperbulan($first_desember, $last_desember)->num_rows();


		$data = array(
			'bmJanuari' => $bmJanuari,
			'bmFebruari' => $bmFebruari,
			'bmMaret' => $bmMaret,
			'bmApril' => $bmApril,
			'bmMei' => $bmMei,
			'bmJuni' => $bmJuni,
			'bmJuli' => $bmJuli,
			'bmAgustus' => $bmAgustus,
			'bmSeptember' => $bmSeptember,
			'bmOktober' => $bmOktober,
			'bmNovember' => $bmNovember,
			'bmDesember' => $bmDesember,
			'bkJanuari' => $bkJanuari,
			'bkFebruari' => $bkFebruari,
			'bkMaret' => $bkMaret,
			'bkApril' => $bkApril,
			'bkMei' => $bkMei,
			'bkJuni' => $bkJuni,
			'bkJuli' => $bkJuli,
			'bkAgustus' => $bkAgustus,
			'bkSeptember' => $bkSeptember,
			'bkOktober' => $bkOktober,
			'bkNovember' => $bkNovember,
			'bkDesember' => $bkDesember,
		);
    	echo json_encode($data);
	}

}
