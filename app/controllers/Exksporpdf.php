<?php

class Exksporpdf extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 

		public function index()
		{
			// $startdate = $_POST["start_date"];
			// $end_date = $_POST["end_date"];
			$data= $this->model('TransakiKeluhanModel')->LaporanTransaki($_POST);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// die();
		

			//$startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
			
			// $data['title'] = "Master Divisi";
			// $data['page'] = "divisi";
			// // $data['kategori'] = $this->model('KategoriModel')->getDataKategori();
			// // $data['status'] = $this->model('StatusModel')->getDataStatus();
			// $this->view('templates/header', $data);
			// $this->view('templates/sidebar', $data);
			// $this->view('divisi/edit_data');
			// $this->view('divisi/tambah');
				//$this->view('divisi/delete_data');
				$this->view('printpdf/index',$data);

			// $this->view('divisi/index', $data);
			// $this->view('templates/footer');
		}

		







	
}