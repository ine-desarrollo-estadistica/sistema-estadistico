<?php
class Ficha_egreso extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Ficha_egreso_model');
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
               $params['sexo']=$data[1];
               $params['e_vivo']=$data[2];
               $params['e_muerto']=$data[3];
               $params['e_ignorado']=$data[4];
               $params['t_medico']=$data[5];
               $params['t_cirugia']=$data[6];
               $params['t_obs']=$data[7];
               $params['t_ignorado']=$data[8];
;              $this->Ficha_egreso_model->InsertarFicha($params);
            }
      }
      $this->load->view('/internas/cargar_ficha_egreso');
      
 
   }

public function estadistica_interna_ficha()
   {


      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            

             $params = array   (
                     'periodo'    => $periodo,
                  
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
         
                  );
     
      }
   
      $res=$this->Ficha_egreso_model->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $res=$this->Ficha_egreso_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Estadisticas_internas/estadistica_interna_ficha', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }






   }