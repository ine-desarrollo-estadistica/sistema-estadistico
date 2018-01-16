<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Municipio_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarMunicipio($params){

		//print_r($params);

		$data = array(
			'codigo' => $params['codigo'],
			'municipio' => $params['municipio'],
			'departamento_cod' => substr($params['codigo'], 0, 2)
		);

		//print_r($data);

		$this->db->insert('municipio', $data);

		$id = $this->db->insert_id();

		return $id;

	}

	
}

?>