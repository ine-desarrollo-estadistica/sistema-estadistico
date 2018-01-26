<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promedio_estancia_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Insertar_promedio($params){
		$data = array(
			'periodo' => $params['periodo'],
			'codigo_departamento' => $params['codigo_departamento'],
			'pacientes_egresados' => $params['pacientes_egresados'],
			'estancia' => $params['estancia'],
		
		);
		$this->db->insert('promedio_estancia',  $data);   
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


		$sql= "SELECT P.periodo as Periodo, D.departamento as Departamento_Residencia,
		I.pacientes_egresados as Pacientes_Egresados , I.estancia as Promedio_Estancia 
		FROM periodo as P, promedio_estancia as I, departamento as D
		WHERE I.periodo=P.id and D.codigo = I.codigo_departamento and P.id  in ".$periodo." and D.codigo in ".$departamento.";";


/*WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and D.codigo in ".$departamento.";";*/





		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}






		
}

?>