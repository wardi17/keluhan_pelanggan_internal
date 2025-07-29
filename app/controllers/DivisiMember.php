<?php

class DivisiMember extends Controller {
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
			
			$data['title'] = "Member Divisi";
			$data['page'] = "divisi";
			$data['kode_divisi'] =$_POST['kode'];
			$data['memberdivisi'] = $this->model('DivisiMemberModel')->DivisiMemberTampil($_POST);
		
			// $data['status'] = $this->model('StatusModel')->getDataStatus();
			// $this->view('templates/header', $data);
			$this->view('memberdivisi/editdata');
			$this->view('memberdivisi/tambahdata');
			$this->view('memberdivisi/deletedata');
			$this->view('memberdivisi/index', $data);
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
	public function tambahDivisimember(){
				$data= $this->model('DivisiMemberModel')->DivisiMemberTambah($_POST);
				if(empty($data)){
					$data = null;
					echo json_encode($data);
				}else{
					echo json_encode($data);
				}
		}

		public function deleteDivisimember(){
			$data= $this->model('DivisiMemberModel')->DivisiMemberDelete($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}

		public function editDivisimember(){
			$data= $this->model('DivisiMemberModel')->DivisiMemberEdit($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}


	// untuk tambah data cutomers
		public function getDatacustomer(){
					$data= $this->model('DivisiModel')->DataCustomerID($_POST);
					if(empty($data)){
						$data = null;
						echo json_encode($data);
					}else{
						echo json_encode($data);
					}
		}

		public function tampilDivisicustomer(){
			$data= $this->model('DivisiModel')->DivisiTampil();
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
		}



	public function MemberDataEmail(){
		$data= $this->model('DivisiMemberModel')->DataCustomerEmail($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}


	public function SimpanHistoryEmail(){
		$data= $this->model('DivisiMemberModel')->DataHistoryEmail($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function EditDataHistoryEmail(){
		$data= $this->model('DivisiMemberModel')->EditHistoryEmail($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function DeleteDataHistoryEmail(){
		$data= $this->model('DivisiMemberModel')->DeleteHistoryEmail($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function ViewDataEmail(){
		$data= $this->model('DivisiMemberModel')->ViewDataMemberEmail($_POST);
		if(empty($data)){
			$data = null;
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}
}