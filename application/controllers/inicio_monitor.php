<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_monitor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
	}	

	public function index()
	{
		$this->load->view('inicio_monitor');
	}
}

?>