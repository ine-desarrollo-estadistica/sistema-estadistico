<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Municipio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Municipio_model');
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
					$params['codigo']=$data[0];
					$params['municipio']=$data[1];
					$this->Municipio_model->InsertarMunicipio($params);
				}
		}
		$this->load->view('/Municipios/cargar');
	}

}

?>
