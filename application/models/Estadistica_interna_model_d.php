<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica_interna_model_d extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarInterna_d ($params){
		$data = array(
			'tipo' => $params['tipo'],
			'periodo' => $params['periodo'],
			'departamento_residencia' => $params['departamento_residencia'],
			'codigo_cie_10' => $params['codigo_cie_10'],
			'causa' => $params['causa'],
			'sexo_m' => $params['sexo_m'],
			'sexo_f' => $params['sexo_f'],
			'ignorado' => $params['ignorado'],
			'total' => $params['total'],
		
		);
		$this->db->insert('estadisticas_internas_d',  $data);   
		$id = $this->db->insert_id();
		return $id;
	}


function ListarPeriodo()
	{
		$this->db->select('*');
		$query = $this->db->get('periodo');
		return $query->result();
	}

	function ListarDepartamento()
	{
		$this->db->select('*');
		$query = $this->db->get('departamento');
		return $query->result();
	}



function ConvertirTexto($datos=null)
	{
		$texto="(";
		$cont=0;
		foreach ($datos as $key => $dato) {
			if($cont==0){
				$texto.=$dato;
			}else{
				$texto.=",".$dato;
			}
			$cont++;
		}
		$texto .= ")";
		return $texto;
	}



	function MostrarDatos($parametros)
	{	
		//$u = $datos['userid'];
		
		//print_r($parametros);

		$periodo = $this->ConvertirTexto($parametros['periodo']);
		$departamento = $this->ConvertirTexto($parametros['departamento']);


		$sql= "SELECT p.periodo as Periodo, D.departamento as Departamento_Residencia, I.codigo_cie_10, I.causa, I.sexo_m, I.sexo_f, I.ignorado as Ignorado, I.total
		FROM periodo as P, estadisticas_internas_d as I, departamento as D
		WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and D.codigo in ".$departamento.";";

		/*WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and I.departamento_residencia in ".$departamento.";";*/

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}





		
}

?>