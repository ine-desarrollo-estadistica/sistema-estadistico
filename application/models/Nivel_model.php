<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nivel_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarNivel($params){
		$data = array(
			'nivel' => $params['nivel']
		);
		$this->db->insert('nivel', $data);
		$id = $this->db->insert_id();
		return $id;
	}	

}