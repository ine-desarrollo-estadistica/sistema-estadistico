<?php
class Estadistica_interna extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Estadistica_interna_model');
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
               $params['periodo']=$data[1];
               $params['periodo_edad']=$data[2];
               $params['codigo_cie_10']=$data[3];
               $params['causa']=$data[4];
               $params['sexo_m']=$data[5];
               $params['sexo_f']=$data[6];
               $params['ignorado']=$data[7];
               $params['total']=$data[8];

;              $this->Estadistica_interna_model->InsertarInterna($params);
            }
      }
      $this->load->view('/internas/cargar');

 
   }

    public function estadistica_interna_edad()
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
   
      $res=$this->Estadistica_interna_model->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $res=$this->Estadistica_interna_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Estadistica_interna_model->ListarEdad();
      $data['edades']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Estadisticas_internas/estadistica_interna_edad', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }

   }