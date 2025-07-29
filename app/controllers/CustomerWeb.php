<?php

class CustomerWeb extends Controller {
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
			$data['title'] = 'Data New';
			$data['page'] = "new";
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
			$data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();
			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('newactivity/divisicustomer');
			$this->view('newactivity/tampilcustomer');
			$this->view('newactivity/tambahdata');
			$this->view('newactivity/divisiterkaitemail');
			$this->view('newactivity/tambahemail');
			$this->view('newactivity/index', $data);
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


	public function TambahDataTransaksi(){
		$data= $this->model('TransakiKeluhanModel')->TambahTransaksiKeluhan($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}


	
}