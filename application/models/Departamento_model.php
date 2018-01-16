<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarDepto($params){

		//print_r($params);

		$data = array(
			'departamento' => $params['departamento']
		);

		//print_r($data);

		$this->db->insert('departamento', $data);

		$id = $this->db->insert_id();

		return $id;

	}

	
}

?>