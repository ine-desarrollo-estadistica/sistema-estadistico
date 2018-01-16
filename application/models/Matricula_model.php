<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matricula_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function InsertarMatricula($params){
		$data = array(
			'tipo' => $params['tipo'],
			'departamento_id' => $params['departamento_id'],
			'periodo_id' => $params['periodo_id'],
			'nivel_id' => $params['nivel_id'],
			'inscritos' => $params['inscritos'],
			'inscritos_edad' => $params['inscritos_edad'],
			'poblacion' => $params['poblacion'],
			'bruta' => $params['bruta'],
			'neta' => $params['neta']
		);
		$this->db->insert('matricula',  $data);
		$id = $this->db->insert_id();
		return $id;
	}

	function InsertarMatriculaGraduadosSuperior($params){
		$data = array(
			'tipo' => 3,
			'periodo_id' => $params['periodo_id'],
			'graduados_p' => $params['graduados_h'],
			'graduados_pr' => $params['graduados_m']
		);
		$this->db->insert('matricula',  $data);
		$id = $this->db->insert_id();
		return $id;
	}

	function ListarPeriodo()
	{
		$this->db->select('*');
		$query = $this->db->get('periodo');
		return $query->result();
	}

	function ListarNivel()
	{
		$this->db->select('*');
		$query = $this->db->get('nivel');
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

		$departamento = $this->ConvertirTexto($parametros['departamento']);
		$nivel = $this->ConvertirTexto($parametros['nivel']);
		$periodo = $this->ConvertirTexto($parametros['periodo']);

		$sql = "SELECT D.departamento, N.nivel, P.periodo, M.inscritos, M.inscritos_edad, M.poblacion, M.bruta, M.neta, D.abv as abDep, N.abv as abNiv
				FROM matricula as M, departamento as D, nivel as N, periodo as P 
				WHERE M.departamento_id = D.id and M.nivel_id = N.id and M.periodo_id = P.id and M.tipo = 1 and
				M.departamento_id in ".$departamento." and M.nivel_id in ".$nivel." and M.periodo_id in ".$periodo. ";";

		$res = $this->db->query($sql);
		return $res->result();
	}


	function AgrupacionSuperior($parametros)
	{	

		$periodo = $this->ConvertirTexto($parametros['periodo']);
		//$agrupacion = $this->ConvertirTexto($parametros['agrupacion']);

		//print_r($parametros['agrupacion']);

		if($parametros['agrupacion']=="1"){
			$sql = "SELECT P.periodo, (M.matriculados_h + M.matriculados_m) as total, M.matriculados_h, M.matriculados_m, (M.graduados_h + M.graduados_m) as totalg, M.graduados_h, M.graduados_m FROM matricula as M, periodo as P where M.periodo_id = P.id and M.tipo = 2 and periodo_id in ".$periodo. ";";

		}else{
			$sql = "SELECT P.periodo, (M.matriculados_p + M.matriculados_pr) as total, M.matriculados_p, M.matriculados_pr, (M.graduados_p + M.graduados_pr) as totalg, M.graduados_p, M.graduados_pr FROM matricula as M, periodo as P where M.periodo_id = P.id and M.tipo = 3 and periodo_id in ".$periodo. ";";
		}

		

		$res = $this->db->query($sql);
		return $res->result();
	}

	function MostrarDatosAprobacion($parametros)
	{	

		$departamento = $this->ConvertirTexto($parametros['departamento']);
		$nivel = $this->ConvertirTexto($parametros['nivel']);
		$periodo = $this->ConvertirTexto($parametros['periodo']);

		$sql = "SELECT D.departamento, N.nivel, P.periodo, D.abv as abDep, N.abv as abNiv,(M.inscritos_h + M.inscritos_m) as Total_inscritos, M.inscritos_h, M.inscritos_m, (M.promovidos_h + M.promovidos_m) as Total_promovidos, M.promovidos_h, 
			M.promovidos_m, ((M.promovidos_h + M.promovidos_m)/(M.inscritos_h + M.inscritos_m)*100) as Total, 
			((M.promovidos_h / M.inscritos_h)*100) as Total_hombres, ((M.promovidos_m / M.inscritos_m)*100) as Total_mujeres
				FROM matricula as M, departamento as D, nivel as N, periodo as P 
				WHERE M.departamento_id = D.id and M.nivel_id = N.id and M.periodo_id = P.id and M.tipo = 4 and
				M.departamento_id in ".$departamento." and M.nivel_id in ".$nivel." and M.periodo_id in ".$periodo. ";";

		$res = $this->db->query($sql);
		return $res->result();
	}

	function MostrarDatosRepeticion($parametros)
	{	

		$departamento = $this->ConvertirTexto($parametros['departamento']);
		$nivel = $this->ConvertirTexto($parametros['nivel']);
		$periodo = $this->ConvertirTexto($parametros['periodo']);

		$sql = "SELECT D.departamento, N.nivel, G.grado, P.periodo, D.abv as abDep, N.abv as abNiv, M.inscritos, M.repitentes, ((M.repitentes/M.inscritos)*100) as tasa_repeticion
				FROM matricula as M, departamento as D, nivel as N, grado as G , periodo as P
				WHERE M.departamento_id = D.id and M.nivel_id = N.id and M.grado_id = G.id 
                and M.periodo_id = P.id and M.tipo = 5 and M.departamento_id in ".$departamento." and M.nivel_id in ".$nivel." and M.periodo_id in ".$periodo. ";";

		$res = $this->db->query($sql);
		return $res->result();
	}

	function InsertarMatriculaRepeticion($params){
		$data = array(
			'tipo' => $params['tipo'],
			'departamento_id' => $params['departamento_id'],
			'periodo_id' => $params['periodo_id'],
			'nivel_id' => $params['nivel_id'],
			'grado_id' => $params['grado_id'],
			'inscritos' => $params['inscritos'],
			'repitentes' => $params['repitentes']
		);
		$this->db->insert('matricula',  $data);
		$id = $this->db->insert_id();
		return $id;
	}


	function InsertarAprobados($params){
		$data = array(
			'tipo' => $params['tipo'],
			'departamento_id' => $params['departamento_id'],
			'periodo_id' => $params['periodo_id'],
			'nivel_id' => $params['nivel_id'],
			'inscritos_h' => $params['inscritos_h'],
			'inscritos_m' => $params['inscritos_m'],
			'promovidos_h' => $params['promovidos_h'],
			'promovidos_m' => $params['promovidos_m']
		);
		$this->db->insert('matricula',  $data);
		$id = $this->db->insert_id();
		return $id;
	}

	function MostrarDatosFecundidad()
	{	
		$sql = "SELECT * FROM fecundidad;";

		$res = $this->db->query($sql);
		return $res->result();
	}

	function MostrarInfoDepto($parametros)
	{	

		$departamento = $parametros['departamento_id'];

		$sql = "SELECT D.departamento, D.codigo, N.nivel, P.periodo, M.poblacion, M.inscritos	 	
				FROM matricula as M, departamento as D, nivel as N, periodo as P 
				WHERE M.departamento_id = D.id and M.nivel_id = N.id 
                and M.periodo_id = P.id and M.tipo = 1 and D.id=".$departamento." and P.id=11;";

		$res = $this->db->query($sql);
		return $res->result();
	}

}