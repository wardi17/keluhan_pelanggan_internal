<?php

class CustFile extends Controller {
	
	public function index(){
$data['keluhan'] = $this->model('KeluhanModel')->keluhanTampilCust();
	$this->view('custfile/selectoption',$data);
	 //$this->view('custfile/index');
		
	}
	
}