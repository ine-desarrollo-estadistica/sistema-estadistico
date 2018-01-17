<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defunciones_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarDefunciones($params){
		$data = array(
			'periodo_cod' => $params['periodo_cod'],
			'departamento_cod' => $params['departamento_cod'],
			'edad' => $params['edad'],
			'hombres' => $params['hombres'],
			'mujeres' => $params['mujeres']
		);
		$this->db->insert('defunciones',  $data);
		$id = $this->db->insert_id();
		return $id;
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

		$departamento = $this->ConvertirTexto($parametros['departamento']);
		$periodo = $this->ConvertirTexto($parametros['periodo']);

		if($parametros['ignorado']){
			$ignorado_opc = " or (D.edad = 109) ";
		}else{
			$ignorado_opc = "";
		}

		$sql = "SELECT D.periodo, P.departamento, D.edad, D.hombres, D.mujeres, (D.hombres + D.mujeres) as total FROM defunciones as D, departamento as P
				WHERE D.departamento_cod = P.codigo and ((D.edad >= ".$parametros['edad']." and D.edad <= ".$parametros['edad2'].")".$ignorado_opc.") and D.departamento_cod in ".$departamento." and D.periodo in ".$periodo.";";

		//print_r($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}

	function MostrarDatosTotales($parametros)
	{	

		$departamento = $this->ConvertirTexto($parametros['departamento']);
		$periodo = $this->ConvertirTexto($parametros['periodo']);

		$sql = "SELECT D.periodo, P.departamento, SUM(D.hombres) as hombres_total, SUM(D.mujeres) as mujeres_total, (SUM(D.hombres)+SUM(D.mujeres)) as total FROM defunciones as D, departamento as P
				WHERE D.departamento_cod = P.codigo and
				D.departamento_cod in ".$departamento." and D.periodo in ".$periodo. " GROUP BY D.periodo and P.departamento;";

		$res = $this->db->query($sql);
		return $res->result();
	}
	
}