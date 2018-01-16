<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarGenerico($params){

			//print_r($params);

			$campo_tablaI= $params['campoI'];
			$campo_tablaII= $params['campoII'];


			$data = array(
				$campo_tablaI => $params[$campo_tablaI],
				$campo_tablaII => $params[$campo_tablaII]
			);

			//print_r($data);

			$this->db->insert($params['tabla'], $data);

			$id = $this->db->insert_id();

			//return $id;

	}


	

}