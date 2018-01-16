<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nivel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Nivel_model');
      	$this->load->helper('url'); 
	}	

	public function index()
	{
	}

	public function cargar()
	{
		if(!empty($_FILES['archivo'])){
			$filename=$_FILES['archivo']['tmp_name'];
			$handle =  fopen($filename, "r");
				while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
				{
					$params['nivel']=$data[0];
					$this->nivel_model->InsertarNivel($params);
				}
		}
		$this->load->view('/Niveles/cargar');
	}
}

?>