<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$this->load->helper('url');
	}		


public function educacion_inicio()
	{
		
		$this->load->view('/Usuarios/educacion_inicio');
	}

public function educacion_menu()
	{
		
      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
	  $this->load->view('/Usuarios/educacion_menu');
	  $this->load->view('/Usuarios/educacion_pie');
	}

public function mapa()
	{
		
      $this->load->view('/dependencias');
      //$this->load->view('/Usuarios/educacion_inicio');
	  $this->load->view('/Usuarios/mapa');
	}

public function cargar()
	{
		if(!empty($_FILES['archivo'])){
			$tabla = $this->input->post('tabla');
			$campoI = $this->input->post('campoI');
			$campoII = $this->input->post('campoII');
			$filename=$_FILES['archivo']['tmp_name'];
				//print_r($filename);
			$handle =  fopen($filename, "r");
				while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
				{
					$params['campoI']=$campoI;
					$params['campoII']=$campoII;
					$params['tabla']=$tabla;
					$params[$campoI]=$data[0];
					$params[$campoII]=$data[1];
					$this->Usuario_model->InsertarGenerico($params);
				}
		}

		//$this->load->view('/dependencias');
		$this->load->view('/Usuarios/cargar');
	}

	public function vitales_menu()
	{
		
      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
	  $this->load->view('/Usuarios/vitales_menu');
	  $this->load->view('/Usuarios/educacion_pie');
	}

}

?>