<?php
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    // Sesi telah kedaluwarsa, arahkan pengguna ke halaman login
    session_unset();
    session_destroy();
		header('location: '. base_url . '/login');
		exit;
}
class Customer extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
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
		
		$data= $this->model('TransakiCustkeluhanModel')->TambahTransaksiKeluhan($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}

	public function CekIdTranksaksi(){
		$data= $this->model('TransakiCustkeluhanModel')->CekIdtransasiByID($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}

	
	//untuk tambah tarnsaksi yang sudah ada 
	
	public function AddTransaksibaru(){
		
			$data['kode_kln'] = $_POST['KodeKeluhan'];
			$data['idtype'] = $_POST['IDType'];
			
			$data['NoTanski'] = $this->model('TransakiCustkeluhanModel')->GetnoUrut($_POST);
			$this->view('templates_cust/header');
			$this->view('templates_cust/sidebarcust');
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
			$this->view('transaksicust/tambahdata');
			$this->view('transaksicust/index', $data);
			$this->view('templates_cust/footer');	
	}
	//end tambah transasi sudah ada
}