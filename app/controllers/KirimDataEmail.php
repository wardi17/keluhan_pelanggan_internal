<?php

class KirimDataEmail extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 


		public function kirimEmailKeluhan(){			
			$data= $this->model('KirimDataEmailModel')->SendDataEmailKeluhan($_POST);
				echo json_encode($data);
			
		}

		public function kirimEmailPerbaikan(){			
			$data= $this->model('KirimDataEmailModel')->SendDataEmailPerbaikan($_POST);
				echo json_encode($data);
			
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

		public function KirimEmailProses(){		
				
			$data= $this->model('KirimDataEmailModel')->SendDataEmailProses($_POST);
				echo json_encode($data);
			
		}

	//   untuk penyimpan  atter data


	public function SimpanDataAtten(){
		$data= $this->model('AttenFiledModel')->SaveDataAtten($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}


	public function TampildataAtten(){
		$data= $this->model('AttenFiledModel')->TampilAtten($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	
	public function DeletedataAtten(){
		$data= $this->model('AttenFiledModel')->DeleteAtten($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}
}