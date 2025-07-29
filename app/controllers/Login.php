<?php

class Login extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Login';
		
		$this->view('login/login', $data);
	}

	public function prosesLogin() {
		if($_POST["username"] == "" && $_POST["password"] == ""){
			header('location: '. base_url . '/login');
			exit;	
		}else{
		if($this->model('LoginModel')->checkLogin($_POST) > 0 ) {
			$row = $this->model('LoginModel')->checkLogin($_POST) ;
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['login_user'] =  $row['username'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['session_login'] = 'sudah_login'; 
				$_SESSION['timeout'] = time() + SESSION_TIMEOUT;
				$_SESSION['divisi'] = $row['divisi'];

				 if($row['nama'] =="Wardi" OR $row['nama'] =="Herman"){
					
				 	$_SESSION['level_user'] =77;
				 }
			
				header('location: '. base_url . '/home');	
				
			
		} else {
			Flasher::setMessage('Username / Password','salah.','danger');
			header('location: '. base_url . '/login');
			exit;	
		}
		}
	}
	
	
	public function RisetPassword(){
		
			$this->view('templates/header');

			$this->view('login/resetpassword');
			$this->view('templates/footer');
	}
	
	public function SimpanRisetPassword(){
			$data = $this->model('ResetPasswordModel')->SimpatResetPassword($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		
	}
}