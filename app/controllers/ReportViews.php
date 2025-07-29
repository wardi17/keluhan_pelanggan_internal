<?php

class ReportViews extends Controller {
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
	
		$data['page'] ='views';
		
		$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCustByID();
		$data['divisi_cust']= $this->model('CustomerModel')->DivisiTampilCustomer();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('reportviews/index',$data);
		$this->view('templates/footer');
	}


	public function laporandata1(){
		$data= $this->model('TransakiKeluhanModel')->ViewsTransaki($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}

	}


	public function AllViewsdata(){
		
		
		$data['transaksi']= $this->model('TransakiKeluhanModel')->getTransaksiAllByID($_POST);

		$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampil();
		 $data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();
		 
		 $data['page'] ='views';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
	
		$this->view('reportviews/tampilviewsdata', $data);
	
	}

     public function LaporanSameri(){
	
	  $data= $this->model('TransakiKeluhanModel')->SameridataTransaksi($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
		 
	 }

	public function GettransaksiBySatu(){
		 $url = $_SERVER['REQUEST_URI'];
		 $parsing = parse_url($url, PHP_URL_QUERY);
		 
		 $exploded = explode(",",$parsing);
		 $kode = $exploded[0];
		 $notrsn = $exploded[1];
		 $kode_keluhan = str_replace("KodeKeluhan=","",$kode);
		 $notransaksi = str_replace("Notransaksi=","",$notrsn);
		$data['transaksi']= $this->model('TransakiKeluhanModel')->getTransaksiSatuByID($kode_keluhan,$notransaksi);

		$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampil();
		 $data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();
		 
		 $data['page'] ='views';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
	
		$this->view('reportviews/tampilviewssatuan', $data);
	}
	
	

	public function listtransaksiviews(){
		 $url = $_SERVER['REQUEST_URI'];
		 $parsing = parse_url($url, PHP_URL_QUERY);
		 $kode_keluhan = str_replace("KodeKeluhan=","",$parsing);
		 
		 	$data['kodekeluhan'] = $kode_keluhan;
			$data['page'] ='views';

			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('reportviews/detaillisview', $data);
			$this->view('templates/footer');

		
	}
	
	
	
	// untuk tampil list data satu id by wardi update 22/11/23
	 public function TampilDataSatuId(){
		$data= $this->model('TransakiKeluhanModel')->ViewTampilDataSatuId($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		
	 }
	//end data
	


}