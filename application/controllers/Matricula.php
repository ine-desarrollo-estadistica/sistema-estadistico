<?php
class Matricula extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Matricula_model');
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
               $params['tipo']=$data[0];
               $params['departamento_id']=$data[1];
               $params['periodo_id']=$data[2];
               $params['nivel_id']=$data[3];
               $params['inscritos']=$data[4];
               $params['inscritos_edad']=$data[5];
               $params['poblacion']=$data[6];
               $params['neta']=$data[7];
               $params['bruta']=$data[8];
               //print_r($params['departamento']);
               $this->Matricula_model->InsertarMatricula($params);
            }
      }
      $this->load->view('/Matriculas/cargar');
   }

   public function reporte()
   {


      //print_r($_POST); 


      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $nivel = $_POST['nivel'];
            $deparamento = $_POST['departamento'];

             $params = array   (
                     'periodo'    => $periodo,
                     'nivel'    => $nivel,
                     'departamento'    => $deparamento
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'nivel'    => array(0),
                     'departamento'    => array(0)
                  );
     
      }

      $res=$this->Matricula_model->MostrarDatos($params);
      
      $data['registros']= json_encode($res);

      $res=$this->Matricula_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Matricula_model->ListarNivel();
      $data['niveles']= json_encode($res); 

      $res=$this->Matricula_model->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/reporte', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }

   public function superior_graduados()
   {


      $agrupacion=0;

      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $agrupacion = $_POST['agrupacion'];

             $params = array   (
                     'periodo'    => $periodo,
                     'agrupacion' => $agrupacion
                  );

               //print_r($agrupacion);
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'agrupacion'    => array(0)
                  );
     
      }

      $res=$this->Matricula_model->AgrupacionSuperior($params);
      //print_r($res);

      $data['agr'] = $agrupacion;

      $data['registros']= json_encode($res);

      $res=$this->Matricula_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/superior_graduados', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }

   public function cargar_gradsup()
   {
      if(!empty($_FILES['archivo'])){
         $filename=$_FILES['archivo']['tmp_name'];
            //print_r($filename);
         $handle =  fopen($filename, "r");
            while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
            {
               $params['periodo_id']=$data[0];
               $params['graduados_h']=$data[2];
               $params['graduados_m']=$data[3];
               //print_r($params['departamento']);
               $this->Matricula_model->InsertarMatriculaGraduadosSuperior($params);
            }
      }
      $this->load->view('/Matriculas/cargar_gradsup');
   }

   public function tasa_aprobacion()
   {

      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $nivel = $_POST['nivel'];
            $deparamento = $_POST['departamento'];

             $params = array   (
                     'periodo'    => $periodo,
                     'nivel'    => $nivel,
                     'departamento'    => $deparamento
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'nivel'    => array(0),
                     'departamento'    => array(0)
                  );
     
      }
      
      $res=$this->Matricula_model->MostrarDatosAprobacion($params);
      //print_r($res);

      $data['registros']= json_encode($res);

      $res=$this->Matricula_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Matricula_model->ListarNivel();
      $data['niveles']= json_encode($res); 

      $res=$this->Matricula_model->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/tasa_aprobacion', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }


   public function tasa_repeticion()
   {

      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $nivel = $_POST['nivel'];
            $deparamento = $_POST['departamento'];

             $params = array   (
                     'periodo'    => $periodo,
                     'nivel'    => $nivel,
                     'departamento'    => $deparamento
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'nivel'    => array(0),
                     'departamento'    => array(0)
                  );
     
      }
      
      $res=$this->Matricula_model->MostrarDatosRepeticion($params);
      //print_r($res);

      $data['registros']= json_encode($res);

      $res=$this->Matricula_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Matricula_model->ListarNivel();
      $data['niveles']= json_encode($res); 

      $res=$this->Matricula_model->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/tasa_repeticion', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }


   public function cargar_aprobacion()
   {
      if(!empty($_FILES['archivo'])){
         $filename=$_FILES['archivo']['tmp_name'];
            //print_r($filename);
         $handle =  fopen($filename, "r");
            while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
            {
               $params['tipo']=$data[0];
               $params['departamento_id']=$data[1];
               $params['periodo_id']=$data[2];
               $params['nivel_id']=$data[3];
               $params['inscritos_h']=$data[4];
               $params['inscritos_m']=$data[5];
               $params['promovidos_h']=$data[6];
               $params['promovidos_m']=$data[7];
               //print_r($params['departamento']);
               $this->Matricula_model->InsertarAprobados($params);
            }
      }
      $this->load->view('/Matriculas/cargar_aprobacion');
   }

   public function cargar_repeticion()
   {
      if(!empty($_FILES['archivo'])){
         $filename=$_FILES['archivo']['tmp_name'];
            //print_r($filename);
         $handle =  fopen($filename, "r");
            while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
            {
               $params['tipo']=$data[0];
               $params['departamento_id']=$data[1];
               $params['periodo_id']=$data[2];
               $params['nivel_id']=$data[3];
               $params['grado_id']=$data[4];
               $params['inscritos']=$data[5];
               $params['repitentes']=$data[6];
               //print_r($params['departamento']);
               $this->Matricula_model->InsertarMatriculaRepeticion($params);
            }
      }
      $this->load->view('/Matriculas/cargar_repeticion');
   }

   public function fecundidad()
   {
      
      $res=$this->Matricula_model->MostrarDatosFecundidad();
      $data['registros']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/fecundidad', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }

   public function info_depto($depto=null)
   {
      
      //print_r($depto);
      $params['departamento_id']=$depto;   
      $res=$this->Matricula_model->MostrarInfoDepto($params);
      $data['registros']= json_encode($res);

      //print_r($data);

      $this->load->view('/dependencias');
      //$this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Matriculas/info_depto', $data);
   }


}
?>