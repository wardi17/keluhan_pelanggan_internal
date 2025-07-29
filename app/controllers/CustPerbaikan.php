<?php

class CustPerbaikan extends Controller {
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
			
			$data['title'] = 'Data perbaikan';
			$data['page'] = "perbaikan";
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampil();
			//die(var_dump($data['keluhan']));
			$data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();

			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('perbaikan/index', $data);
			$this->view('templates/footer');
		}

		

	// untuk tambah data cutomers
		public function getDatacustomer(){
					$data= $this->model('CustomerModel')->DataCustomerID($_POST);
					if(empty($data)){
						$data = null;
						echo json_encode($data);
					}else{
						echo json_encode($data);
					}
		}

		public function tampilDivisicustomer(){
			$data= $this->model('CustomerModel')->DivisiTampilCustomer();
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		public function cariCustomer(){
			$data= $this->model('CustomerModel')->dataCust($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			  }else{
				echo json_encode($data);
			  }
	}


	public function Tambahdata(){
		
		$data['title'] = 'Data Edit';
		$data['page'] = "perbaikan";
		$data['transaksi']= $this->model('TransakiKeluhanModel')->getTransaksiById($_POST);
	
		$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampil();
		 $data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();
	
		// $this->view('perbaikan/divisicustomer');
		// $this->view('perbaikan/tampilcustomer');
		// $this->view('perbaikan/tambahdata');
		$this->view('perbaikan/tampilemail');
		$this->view("perbaikan/perbaikanjs");
		$this->view('perbaikan/inputdata', $data);
	}
	public function TambahDataTransaksi(){

		$data= $this->model('TransakiKeluhanModel')->TambahTransaksiPerbaikan($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}


	
}