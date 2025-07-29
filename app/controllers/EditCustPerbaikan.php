<?php

class EditCustPerbaikan extends Controller {
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
		
			$this->view('editperbaikan/divisicustomer');
			$this->view('editperbaikan/tampilcustomer');
			$this->view('editperbaikan/tambahdata');
			$this->view('editperbaikan/divisiterkaitemail');
			$this->view('editperbaikan/tampilemail');
			$this->view('editperbaikan/index', $data);
		
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
		$data= $this->model('TransakiKeluhanModel')->UpdateTransaksiPerbaikan($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		  }else{
			echo json_encode($data);
		  }
	}
	
}