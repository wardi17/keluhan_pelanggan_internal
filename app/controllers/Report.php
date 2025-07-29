<?php

class Report extends Controller {
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
	
		//die(var_dump($this->model('KategoriModel')));
		$data['title'] = 'Report transaksi';
		$data['page'] ='report';
		$data['divisi_cust']= $this->model('CustomerModel')->DivisiTampilCustomer();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('report/index',$data);
		$this->view('templates/footer');
	}

	// public function laporan2(){
	// 	$data['title'] = 'Report transaksi';
	// 	$data['page'] ='report2';
	// 	$data['divisi']= $this->model('DivisiModel')->DivisiTampil();
	// 	$this->view('templates/header', $data);
	// 	$this->view('templates/sidebar', $data);
	// 	$this->view('report/laporan2',$data);
	// 	$this->view('templates/footer');
	// }


	public function laporandata1(){
	
		$data= $this->model('TransakiKeluhanModel')->LaporanTransaki($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}

	}



}