<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica_interna_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarInterna($params){
		$data = array(
			'tipo' => $params['tipo'],
			'periodo' => $params['periodo'],
			'periodo_edad' => $params['periodo_edad'],
			'codigo_cie_10' => $params['codigo_cie_10'],
			'causa' => $params['causa'],
			'sexo_m' => $params['sexo_m'],
			'sexo_f' => $params['sexo_f'],
			'ignorado' => $params['ignorado'],
			'total' => $params['total'],
		
		);
		$this->db->insert('estadisticas_internas',  $data);   
		$id = $this->db->insert_id();
		return $id;
	}

	function ListarPeriodo()
	{
		$this->db->select('*');
		$query = $this->db->get('periodo');
		return $query->result();
	}

	function ListarEdad()
	{
		$this->db->select('*');
		$query = $this->db->get('edad_rango');
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
		$edad = $this->ConvertirTexto($parametros['edad']);

		$sql = "SELECT P.periodo, E.descripcion as edad, I.codigo_cie_10, I.causa, I.sexo_m, I.sexo_f, I.Ignorado, I.total FROM estadisticas_internas as I, periodo as P, edad_rango as E WHERE I.periodo=P.id and I.periodo_edad=E.codigo and P.id in ".$periodo." and E.codigo in ".$edad.";";

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}

		
}

?>