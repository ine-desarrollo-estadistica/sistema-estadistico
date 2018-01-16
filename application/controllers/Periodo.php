<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Periodo_model');
		$this->load->helper('url'); 
	}
	
	public function index()
	{

	}
	
	
}

?>
