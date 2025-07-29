<?php

class listkeluhancust extends Controller {
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
	

		$data['title'] = 'Data listkeluhan';
		$data['page'] = "list";
		// $data['user'] = $this->model('UserModel')->getAllUser();
		$this->view('templates_cust/header', $data);
		$this->view('templates_cust/sidebarcust');
		$this->view('listkeluhancustheader/index', $data);
		$this->view("listkeluhancustheader/catatanperbaikan");
		//$this->view("listkeluhancust/kirimemail");
		$this->view("listkeluhancustheader/tampilgambar");
		$this->view('templates_cust/footer');
	}

	public function index2()
	{
		

		$data['title'] = 'Data listkeluhan';
		$data['page'] = "list";
		// $data['user'] = $this->model('UserModel')->getAllUser();
		$this->view('templates_cust/header', $data);
		$this->view('templates_cust/sidebarcust');
		$this->view('listkeluhancust/index', $data);
		$this->view("listkeluhancust/catatanperbaikan");
		//$this->view("listkeluhancust/kirimemail");
		$this->view("listkeluhancust/tampilgambar");
		$this->view('templates_cust/footer');
	}


		public function tampildata(){
	
			$data= $this->model('TransakiCustkeluhanModel')->TransakiCustTampil($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}



		public function GambarKeluhan(){
			$data= $this->model('TransakiKeluhanModel')->DataGambarKeluhan($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		
		public function JawabanKeluhan(){
			 //$time1 = $_SERVER["QUERY_STRING"];
			 //echo $_SERVER['REQUEST_URI'];
			 $url = $_SERVER['REQUEST_URI'];
			 $parsing = parse_url($url, PHP_URL_QUERY);
			 $expolod = explode(",",$parsing);
			 $kode = $expolod[0];
			 $kodeTransaksi = $expolod[1];
			 $kode_keluhan = str_replace("KodeKeluhan=","",$kode);
			 $kode_transaksi = str_replace("NoTransaksi=","",$kodeTransaksi);
				
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
			$data['transaksi']= $this->model('TransakiCustkeluhanModel')->DetaiKeluhan($kode_keluhan,$kode_transaksi);
			$this->view('templates_cust/header');
			$this->view('templates_cust/sidebarcust');
			$this->view("listkeluhancust/detailkeluhancust",$data);
			$this->view('templates_cust/footer');
			
		}
		
		
		public function SubKeluhan(){
			
			$url = $_SERVER['REQUEST_URI'];
			 $parsing = parse_url($url, PHP_URL_QUERY);
			 
			 $explode = explode(",",$parsing);
			 $kode = $explode[0];
			 $jml = $explode[1];
			 $kode_keluhan = str_replace("KodeKeluhan=","",$kode);
			 $jumlah = str_replace("jumlahtransaksi=","",$jml);
			$data['kodekeluhan'] = $kode_keluhan;
				$data['jumlah'] = $jumlah;
			//$data['transaksi']= $this->model('TransakiCustkeluhanModel')->TransakiCustTampilDetail($kode_keluhan);
			
				$data['title'] = 'Data listkeluhan';
				$data['page'] = "perbaikan";
				// $data['user'] = $this->model('UserModel')->getAllUser();
				$this->view('templates_cust/header', $data);
				$this->view('templates_cust/sidebarcust');
				$this->view('listkeluhancust/index', $data);
				//$this->view("listkeluhancust/catatanperbaikan");
				//$this->view("listkeluhancust/kirimemail");
				//$this->view("listkeluhancust/tampilgambar");
				$this->view('templates_cust/footer');
		}
		
		//untuk tampil detail
		public function TampilDatacustDetail(){
	
			$data= $this->model('TransakiCustkeluhanModel')->TransakiCustTampilDetail($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}
		
		public function KeluhanSelesai(){
			$data= $this->model('TransakiCustkeluhanModel')->TransakiCustSelesai($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}
		
		// public function laporanData2(){
		// 	$data= $this->model('TransakiKeluhanModel')->ActivityLaporan2($_POST);
		// 	if(empty($data)){
		// 		$data = null;
		// 		echo json_encode($data);
		// 	}else{
		// 		echo json_encode($data);
		// 	}
		// }



		// public function deleteData(){
		// 	$data= $this->model('DivisiModel')->DivisiDelete($_POST);
		// 	if(empty($data)){
		// 		$data = null;
		// 		echo json_encode($data);
		// 	}else{
		// 		echo json_encode($data);
		// 	}
		// }

		// public function editData(){
		// 	$data= $this->model('DivisiModel')->DivisiEdit($_POST);
		// 	if(empty($data)){
		// 		$data = null;
		// 		echo json_encode($data);
		// 	}else{
		// 		echo json_encode($data);
		// 	}
		// }


		// public function updateActivity(){	
		// 	$data= $this->model('TransakiKeluhanModel')->TransakiKeluhanUpdate($_POST);
		// 		if(empty($data)){
		// 			$data = null;
		// 			echo json_encode($data);
		// 		}else{
		// 			echo json_encode($data);
		// 		}
			
		// }

	
}