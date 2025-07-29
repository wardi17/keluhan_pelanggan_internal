<?php

class Divisi extends Controller {
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
			$data['title'] = "Master Divisi";
			$data['page'] = "divisi";
			// $data['kategori'] = $this->model('KategoriModel')->getDataKategori();
			// $data['status'] = $this->model('StatusModel')->getDataStatus();
			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('divisi/edit_data');
			$this->view('divisi/tambah');
			$this->view('divisi/delete_data');
			$this->view('divisi/index', $data);

			$this->view('divisi/index', $data);
			$this->view('templates/footer');
		}

		public function tampildata(){
			$data= $this->model('DivisiModel')->DivisiTampil();
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}
	// untuk tambah data 
	public function tambahdivisi(){
				$data= $this->model('DivisiModel')->DivisiTambah($_POST);
				if(empty($data)){
					$data = null;
					echo json_encode($data);
				}else{
					echo json_encode($data);
				}
		}

		public function deleteData(){
			$data= $this->model('DivisiModel')->DivisiDelete($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		public function editData(){
			$data= $this->model('DivisiModel')->DivisiEdit($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}









	
}