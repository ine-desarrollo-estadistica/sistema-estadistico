<?php
class Estadistica_interna_d extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Estadistica_interna_model_d');
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
               $params['departamento_residencia']=$data[2];
               $params['codigo_cie_10']=$data[3];
               $params['causa']=$data[4];
               $params['sexo_m']=$data[5];
               $params['sexo_f']=$data[6];
               $params['ignorado']=$data[7];
               $params['total']=$data[8];
;              $this->Estadistica_interna_model_d->InsertarInterna_d ($params);
            }
      }
      $this->load->view('/internas2/cargar');
      
 
   }

public function estadistica_interna_departamento()
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
   
      $res=$this->Estadistica_interna_model_d->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $res=$this->Estadistica_interna_model_d->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Estadistica_interna_model_d->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Estadisticas_internas/estadistica_interna_dep', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }



   }