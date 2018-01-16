<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('usuario_model');
		$this->load->library('session');
		$this->load->helper('url');
	}	

	public function index()
	{
		$this->load->view('login');
	}

	public function iniciarSesion()
	{
		$params =	array
					(
						'userid' => $this->input->post('userid'),
						'password' => $this->input->post('password')
					);
					
		$rolesDbRes = $this->usuario_model->autenticarUsuario($params);
		
		if ($rolesDbRes != false) { 
			$rolesDataSet = $rolesDbRes->result()[0];
			//set sessions
			$this->session->set_userdata('sesion', true);
			$this->session->set_userdata('usuario', $rolesDataSet->usuario);
			$this->session->set_userdata('usuario_id', $rolesDataSet->id_persona);
			$this->session->set_userdata('usuario_nombre', $rolesDataSet->pnombre);
			$this->session->set_userdata('rol', $rolesDataSet->rol);

			/*$sesionid = $this->usuario_model->guardarSesion();
			$this->session->set_userdata('sesion_id', $sesionid);*/

			//Preferiblemente redireccionar
			switch ($rolesDataSet->rol) 
			{
				case 'MONITOR':
					//$this->load->view('calendario');
					redirect("inicio_monitor");
					break;
				/*case 'MEDICO':
					// $this->session->set_userdata('paciente_id', 1);
					// $this->session->set_userdata('paciente', "Juan Perez Sosa");
					redirect('hojaevol');
					
					// $data['rolesR'] = $rolesDbRes;
					// $this->load->view('result',$data);
					break;* /

				case 'ADMIN'; case 'INVENTARIO'; case 'ORDENES'; case 'CAJA'; case 'REPORTES';
					redirect("inicioadmin");
					break;

				/*case 'REPORTERIA':
					redirect("repocsv");
					break;					*/
					
				default:
					//redirect("login");
					break;
			}
		} else {
			$data['login_estatus']='1';
			$data['usuario_negado'] = $params['userid'];
			$this->load->view('login',$data);
		}
	}

	/*public function cerrarSesion()
	{
		$this->usuario_model->finSesion();
		$this->session->sess_destroy();
		redirect("login");
	}*/
}

?>