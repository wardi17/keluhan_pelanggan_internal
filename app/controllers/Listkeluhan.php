<?php

class listkeluhan extends Controller {
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
		$data['page'] = "perbaikan";
		// $data['user'] = $this->model('UserModel')->getAllUser();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('listkeluhan/index', $data);
		$this->view("listkeluhan/tampilemail");
		$this->view("listkeluhan/kirimemail");
		$this->view("listkeluhan/tampilgambar");
		$this->view('templates/footer');
	}




		public function tampildata(){
			$data= $this->model('TransakiKeluhanModel')->TransakiKeluhanTampil($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}




//untuk views detail keluhan
		public function DetailkKeluhan(){
			
			$url = $_SERVER['REQUEST_URI'];
			 $parsing = parse_url($url, PHP_URL_QUERY);
			 $kode_keluhan = str_replace("KodeKeluhan=","",$parsing);
		
			$data['kodekeluhan'] = $kode_keluhan;
			$data['page'] = "perbaikan";

			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('perbaikandetail/index', $data);
			$this->view('templates/footer');
			
		}

	public function TampilDataDetail(){
		
			$data= $this->model('TransakiKeluhanModel')->TransakiKeluhanTampilDetail($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}



//end detail keluahn

		public function GambarKeluhan(){
			$data= $this->model('TransakiKeluhanModel')->DataGambarKeluhan($_POST);
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