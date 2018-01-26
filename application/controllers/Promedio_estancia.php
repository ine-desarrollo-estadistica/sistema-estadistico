<?php
class Promedio_estancia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Promedio_estancia_model');
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
               $params['codigo_departamento']=$data[1];
               $params['pacientes_egresados']=$data[2];
               $params['estancia']=$data[3];
;              $this->Promedio_estancia_model->Insertar_promedio($params);
            }
      }
      $this->load->view('/internas/cargar_promedio_estancia');
      
 
   }


public function Promedio_estancia_ficha()
   {


      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $departamento = $_POST['departamento'];

             $params = array   (
                     'periodo'    => $periodo,
                     'departamento'    => $departamento
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'departamento'    => array(0)
                  );
     
      }
   
      $res=$this->Promedio_estancia_model->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $res=$this->Promedio_estancia_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Promedio_estancia_model->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Estadisticas_internas/Estadistica_interna_estancias', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }






   }