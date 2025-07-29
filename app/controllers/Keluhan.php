<?php

class Keluhan extends Controller {
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
		
		$data['title'] = 'Data keluhan';
		$data['page'] = "keluhan";
		// $data['user'] = $this->model('UserModel')->getAllUser();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('keluhan/index', $data);
		$this->view('templates/footer');
	}


	// untuk tambah data 
	public function tambahkeluhan(){
				$data= $this->model('KeluhanModel')->keluhanTambah($_POST);
				if(empty($data)){
					$data = null;
					echo json_encode($data);
				}else{
					echo json_encode($data);
				}
	}

		public function tampildata(){
			$data= $this->model('KeluhanModel')->keluhanTampil();
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}


		public function deleteData(){
			$data= $this->model('KeluhanModel')->keluhanDelete($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		public function editData(){
			$data= $this->model('KeluhanModel')->keluhanEdit($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}




	
}