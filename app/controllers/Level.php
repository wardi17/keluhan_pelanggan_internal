<?php

class Level extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	
	
		public function tambah(){
			$data['page'] = "level";
			$data['aksesmenu'] = $this->aksesMenu();
			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);	
			$this->view('level/tambah', $data);
			$this->view('templates/footer');
		}	
		
		
		public function index()
		{
			$data['title'] = "Master level";
			$data['page'] = "level";
			// $data['kategori'] = $this->model('KategoriModel')->getDataKategori();
			// $data['status'] = $this->model('StatusModel')->getDataStatus();
			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('level/edit_data');
			$this->view('level/delete_data');
			$this->view('level/index', $data);

			$this->view('level/index', $data);
			$this->view('templates/footer');
		}

		public function SimpanLevel(){
			die(var_dump($_POST));
			
			$data= $this->model('levelModel')->levelTampil();
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}
	// untuk tambah data 
	public function tambahlevel(){
				$data= $this->model('levelModel')->levelTambah($_POST);
				if(empty($data)){
					$data = null;
					echo json_encode($data);
				}else{
					echo json_encode($data);
				}
		}

		public function deleteData(){
			$data= $this->model('levelModel')->levelDelete($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		public function editData(){
			$data= $this->model('levelModel')->levelEdit($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}





	private function aksesMenu(){
		
			$path    = __DIR__; //lokasi folder sekarang 
	
			$files = scandir($path);
			
			$files = array_diff(scandir($path), array('.', '..'));
			
				$controler =[];
			foreach($files as $nama_file)
			{
				
				$str = str_replace(".php","",$nama_file);
				$strlower = strtolower($str);
				$controler[] =$strlower;
			}
			return $controler;
	}





	
}