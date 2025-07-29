<?php

class RegistasiCustomer extends Controller{
	

	
	public function index(){
			$data['page'] = "registasi";
		
			$this->view('templates/header', $data);

			$this->view('registasicustomer/index', $data);
			$this->view('templates/footer');
	}
	
	
	public function DaftarCustomer(){
	
		$data = $this->model('RegistasiModel')->SimpatPendaftaran($_POST);
			if(empty($data)){
				$data = null;
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}
	}

}