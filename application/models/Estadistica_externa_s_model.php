<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica_externa_s_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarRegistro($params){

		//print_r($params);

		$data = array(
			
			'periodo' => $params['periodo'],
			'edad' => $params['edad'],
			'sexo' => $params['sexo'],
			'primera_consulta' => $params['primera_consulta'],
			'reconsulta' => $params['reconsulta'],
			'emergencia' => $params['emergencia'],
			'ignorado' => $params['ignorado'],
			'total' => $params['total'],
		);

		//print_r($data);

		$this->db->insert('atencion_externos', $data);

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

		$periodo = $this->ConvertirTexto($parametros['periodo']); /*parametros de periodo*/
		$edad = $this->ConvertirTexto($parametros['edad']);     /*parametros de edad*/ 


		$sql= "SELECT P.periodo as Periodo , E.descripcion as Periodo_edad, F.sexo as Sexo, I.primera_consulta, I.reconsulta, I.emergencia, I.ignorado, total as Total
			FROM atencion_externos as I, periodo as P, edad_rango as E , sexo as F
			WHERE I.periodo=P.id  and F.codigo= I.sexo and E.codigo= I.edad and P.id in ".$periodo." and E.codigo in ".$edad.";";

		/*WHERE I.periodo=P.id and D.codigo = I.departamento_residencia and P.id in ".$periodo." and I.departamento_residencia in ".$departamento.";";*/

		//printf($sql);

		$res = $this->db->query($sql);
		return $res->result();
	}




}

?>