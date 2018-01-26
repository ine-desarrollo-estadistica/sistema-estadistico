<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica_externa_e_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarRegistro($params){

		//print_r($params);

		$data = array(
			
			'periodo' => $params['periodo'],
			'periodo_edad' => $params['periodo_edad'],
			'codigo_cie_10' => $params['codigo_cie_10'],
			'causa_atencion' => $params['causa_atencion'],
			'sexo_m' => $params['sexo_m'],
			'sexo_f' => $params['sexo_f'],
			'ignorado' => $params['ignorado'],
			'total' => $params['total'],
		);

		//print_r($data);

		$this->db->insert('estadisticas_externas_e', $data);

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


		$sql= "SELECT P.periodo, E.descripcion as Edad, I.codigo_cie_10 as Codigo, I.causa_atencion as Causa_atención, I.sexo_m as Sexo_masculino, I.sexo_f as Sexo_femenino, I.Ignorado as Ignorado, total as Total
				FROM estadisticas_externas_e as I, periodo as P, edad_rango as E 
				WHERE I.periodo=P.id and I.periodo_edad=E.codigo  and P.id in ".$periodo." and E.codigo in ".$edad.";";

		/*WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and I.departamento_residencia in ".$departamento.";";*/

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}

	
}

?>

	

