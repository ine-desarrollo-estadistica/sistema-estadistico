<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_egreso_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarFicha($params){
		$data = array(
			'periodo' => $params['periodo'],
			'sexo' => $params['sexo'],
			'e_vivo' => $params['e_vivo'],
			'e_muerto' => $params['e_muerto'],
			'e_ignorado' => $params['e_ignorado'],
			't_medico' => $params['t_medico'],
			't_cirugia' => $params['t_cirugia'],
			't_obs' => $params['t_obs'],
			't_ignorado' => $params['t_ignorado'],
		);
		$this->db->insert('ficha_egreso',  $data);   
		$id = $this->db->insert_id();
		return $id;
	}



function ListarPeriodo()
	{
		$this->db->select('*');
		$query = $this->db->get('periodo');
		return $query->result();
	}

	

	function ConvertirTexto($datos=null)
	{
		$texto="(";

		foreach ($datos as $key => $dato) {
			$texto.=$dato.",";
		}

		$texto .= "0)";

		//print_r($texto);

		return $texto;
	}

	function MostrarDatos($parametros)
	{	
		//$u = $datos['userid'];
		
		//print_r($parametros);

		$periodo = $this->ConvertirTexto($parametros['periodo']);
	

	


		$sql = "SELECT  P.periodo as Periodo , sexo as Sexo, e_vivo as Estado_vivo, e_muerto as Estado_muerto, e_ignorado as Estado_ignorado,
		t_medico as Tratamiento_medico, t_cirugia as Tratamiento_cirugia, t_obs as Tratamiento_obstetrico, t_ignorado as Tratamiento_ignorado
		FROM ficha_egreso as I , periodo as P where I.periodo = P.id and P.id in ".$periodo." ;";

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}




		
}

?>