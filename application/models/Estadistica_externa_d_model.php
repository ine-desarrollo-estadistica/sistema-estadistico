<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica_externa_d_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarRegistro($params){

		//print_r($params);

		$data = array(
			
			'periodo' => $params['periodo'],
			'departamento' => $params['departamento'],
			'codigo_cie_10' => $params['codigo_cie_10'],
			'causa_atencion' => $params['causa_atencion'],
			'sexo_m' => $params['sexo_m'],
			'sexo_f' => $params['sexo_f'],
			'ignorado' => $params['ignorado'],
			'total' => $params['total'],
		);

		//print_r($data);

		$this->db->insert('estadisticas_externas_d', $data);

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


		$sql= "SELECT P.periodo as Periodo, D.departamento as Departamento, codigo_cie_10 as Codigo, causa_atencion as 
				Causa_atención, sexo_m as Sexo_masculino, sexo_f as Sexo_femenino , ignorado as Ignorado, total as Total
				from periodo as P , estadisticas_externas_d as E, departamento as D
				where p.id = e.periodo and D.codigo = E.departamento and P.id in ".$periodo." and D.codigo in ".$departamento.";";

		/*WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and I.departamento_residencia in ".$departamento.";";*/

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}




}

?>

