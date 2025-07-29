<?php

class EditCustomer extends Controller {
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
		
			$data['title'] = 'Data Edit';
			$data['page'] = "list";
			$data['transaksi']= $this->model('TransakiKeluhanModel')->getTransaksiById($_POST);
			$id_div ="";
			foreach($data["transaksi"] as $items){
				$id_div =$items["Divisi"];
			
				
			}
			$data["customer"] =$this->model('CustomerModel')->DataCustomerByID($id_div);
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
			$data['ms_divisi'] = $this->model('DivisiModel')->DivisiTampil();
		
			$data['divisi_cust']= $this->model('CustomerModel')->DivisiTampilCustomer();
		
			//$this->view('editactivity/divisicustomer');
			$this->view('editactivity/tampilcustomer');
			$this->view('editactivity/tambahdata');
			$this->view('editactivity/divisiterkaitemail');
			$this->view('editactivity/tambahemail');
			$this->view('editactivity/index', $data);
		
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


	public  function UpdateDataTransaksi(){
		$data= $this->model('TransakiKeluhanModel')->UpdateTransaksiKeluhan($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}
	
}