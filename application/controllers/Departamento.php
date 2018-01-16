<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Departamento_model');
		$this->load->helper('url'); 
	}
	
	public function index()
	{
		 

	}
	
	public function cargar()
	{
		if(!empty($_FILES['archivo'])){
			$filename=$_FILES['archivo']['tmp_name'];
				//print_r($filename);
			$handle =  fopen($filename, "r");
				while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
				{
					$params['departamento']=$data[0];
					$this->departamento_model->InsertarDepto($params);
				}
		}
		$this->load->view('/Departamentos/cargar');
	}

}

?>
