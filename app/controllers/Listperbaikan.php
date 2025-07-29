<?php

class Listperbaikan extends Controller {
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
	

		$data['title'] = 'Data Listperbaikan';
		$data['page'] = "perbaikan";
		// $data['user'] = $this->model('UserModel')->getAllUser();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('listperbaikan/index', $data);
		$this->view("listperbaikan/tampilemail");
		$this->view("listperbaikan/kirimemail");
		$this->view("listperbaikan/emailproses");
		$this->view("listperbaikan/kirimopen");
		$this->view("listperbaikan/tampilgambar");
		$this->view('templates/footer');
	}




		public function tampildata(){
			$data= $this->model('TransakiKeluhanModel')->TransakiPerbaikanTampil($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}



		public function GambarPerbaikan(){
			$data= $this->model('TransakiKeluhanModel')->DataGambarPerbaikan($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}


		public function SimpatPerbaikanSelesai(){
			$data= $this->model('TransakiKeluhanModel')->PerbaikanSelesai($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}



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