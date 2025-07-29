<?php
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    // Sesi telah kedaluwarsa, arahkan pengguna ke halaman login
    session_unset();
    session_destroy();
		header('location: '. base_url . '/login');
		exit;
}

class Home extends Controller {
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
		$divisi =Trim($_SESSION['divisi']);
		
		$user_h = $_SESSION['nama'];
		if($divisi =="CS"){
				$data['title'] = 'Halaman Home';
			$data['message']= $this->model('HomeModel')->DataMessage();
			 $this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('home/get_category_js');
			$this->view('home/get_grafik_js');
			$this->view('home/get_tabelsameri');
			$this->view('home/message');
			$this->view('home/index', $data);
			$this->view('templates/footer');
		}elseif($user_h =="Herman"  OR $user_h =="Wardi"){
			$data['title'] = 'Halaman Home';
			$data['message']= $this->model('HomeModel')->DataMessage();
			 $this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('home/get_category_js');
			$this->view('home/get_grafik_js');
			$this->view('home/get_tabelsameri');
			$this->view('home/message');
			$this->view('home/index', $data);
			$this->view('templates/footer');
			
		}else{
			$this->view('templates_cust/header');
			$this->view('templates_cust/sidebarcust');
			$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
			$this->view('transaksicust/tambahdata');
			$this->view('transaksicust/index', $data);
			$this->view('templates_cust/footer');	
		
		
		
			
		}
			

			
			
	}

	public function get_Category(){
		
		$data= $this->model('HomeModel')->DataKategory($_POST);
		if(empty($data)){
			$data = null;
		  
			echo json_encode($data);
		  }else{
			
			echo json_encode($data);
		  }
	}


	public function get_Grafik(){
		$data= $this->model('HomeModel')->DataGrafik($_POST);
		if(empty($data)){
			$data = null;
		  
			echo json_encode($data);
		  }else{
			
			echo json_encode($data);
		  }
	}

	public function simpancomment(){
		$data = $this->model('HomeModel')->SimpanMessage($_POST);
		if(empty($data)){
			$data = null;
		  
			echo json_encode($data);
		  }else{
			
			echo json_encode($data);
		  }
	}


	public function DataTabelSm(){
		$data = $this->model('HomeModel')->TampilDataTabelSM($_POST);
		if(empty($data)){
			$data = null;
		  
			echo json_encode($data);
		  }else{
			
			echo json_encode($data);
		  }
	}


	public function DataTabelDetail_all(){
		
		$data = $this->model('HomeModel')->TampilDataTabelDetail($_POST);
		
		if(empty($data)){
			$data = null;
		  
			echo json_encode($data);
		  }else{
			
			echo json_encode($data);
		  }
	}

	
		public function detail(){
		 $url = $_SERVER['REQUEST_URI'];
		 $parsing = parse_url($url, PHP_URL_QUERY);
		 $kode_keluhan = str_replace("KodeKeluhan=","",$parsing);
		 
		 	$data['kodekeluhan'] = $kode_keluhan;
			$data['page'] ='home';

			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('home/detaillisview', $data);
			$this->view('templates/footer');

		
	}
	
	
	public function detailsatu(){
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
		 
		 $data['page'] ='home';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
	
		$this->view('home/tampilviewssatuan', $data);
		
	}
	

}