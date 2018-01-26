<?php 

class Estadistica_externa_s extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Estadistica_externa_s_model');
		$this->load->helper('url'); 
	}
	
	public function index()
	{
		 

	}
	
	public function cargar()
	{
		if(!empty($_FILES['archivo'])){
			$filename=$_FILES['archivo']['tmp_name'];
				//print_r($filename);
			$handle =  fopen($filename, "r");
				while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
				{
			   		
              		$params['periodo']=$data[0];
               		$params['edad']=$data[1];
               		$params['sexo']=$data[2];
               		$params['primera_consulta']=$data[3];
               		$params['reconsulta']=$data[4];
               		$params['emergencia']=$data[5];
               		$params['ignorado']=$data[6];
               		$params['total']=$data[7];
					$this->Estadistica_externa_s_model->InsertarRegistro($params);
				}
		}
		$this->load->view('/Estadisticas_externas/cargar3');
	}




public function estadistica_externa_s()
   {


      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $edad = $_POST['edad'];

             $params = array   (
                     'periodo'    => $periodo,
                     'edad'    => $edad
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'edad'    => array(0)
                  );
     
      }
   
      $res=$this->Estadistica_externa_s_model->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $res=$this->Estadistica_externa_s_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Estadistica_externa_s_model->ListarEdad();
      $data['edades']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Estadisticas_externas/estadisticas_externas_s', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }




}



?>