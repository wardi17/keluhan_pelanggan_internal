<?php
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    // Sesi telah kedaluwarsa, arahkan pengguna ke halaman login
    session_unset();
    session_destroy();
		header('location: '. base_url . '/login');
		exit;
}
class Profile extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	
	public function index(){
		
		 $email["email"] = $_SESSION["login_user"];
		  $data['user'] = $this->model('UserModel')->getUserById($email);
		
			
			$this->view('templates_cust/header');
			$this->view('templates_cust/sidebarcust');
		
			$this->view('profile/index', $data);
			$this->view('templates_cust/footer');	
	}
	
	public function cekpassword(){

		$data= $this->model('MemberExtModel')->Cekpassword($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}
	
	
	public function updatepassword(){
		$data= $this->model('MemberExtModel')->updatePassword($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		
	}
}