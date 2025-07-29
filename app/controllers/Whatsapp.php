<?php

class Whatsapp extends Controller {
	
	
	public function Hp1xx(){
			die(var_dump($_GET));
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

			$nama = $this->test_input($_GET['nama']);
			$email = $this->test_input($_GET['email']);
			$nohp = $this->test_input($_GET['nohp']);
		
		$data = array(
			"nama" => $nama,
			"email" =>$email,
			"nohp" => $nohp,
		);
		
	
		/*header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		header('Access-Control-Allow-Headers: X-Requested-With'); */
		header('Content-Type: application/json');

			// Misalnya, data yang ingin Anda kirimkan melalui API adalah data pengguna.
		
			echo json_encode($data);
		exit();
		
	}else{
	  header('HTTP/1.1 405 Method Not Allowed');
	  exit('Method Not Allowed');
	}
		//$this->ApiDataNoHp1($data);
	
		
	}
		public function Hp1(){
		
		$this->view('login/login');
		
		}
	
		public function Hp2(){
		
		$this->view('login/login');
		
		}
	
	public function ApiDataNoHp1($data){
		

		header("Content-Type: application/json");


		// Misalnya, data yang ingin Anda kirimkan melalui API adalah data pengguna.
	
		echo json_encode($data);
		//header('location: '. base_url . '/login');
		
	}
	
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
}


