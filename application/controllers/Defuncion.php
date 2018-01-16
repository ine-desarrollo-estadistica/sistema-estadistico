<?php
class Defuncion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Defunciones_model');
      $this->load->model('Matricula_model');
      $this->load->helper('url'); 
	}

   public function cargar()
      {
      if(!empty($_FILES['archivo'])){
         $filename=$_FILES['archivo']['tmp_name'];
            //print_r($filename);
         $handle =  fopen($filename, "r");
            while(($data = fgetcsv($handle, 1000, ","))!== FALSE)
            {
               $params['periodo_cod']=$data[0];
               $params['departamento_cod']=$data[1];
               $params['edad']=$data[2];
               $params['hombres']=$data[3];
               $params['mujeres']=$data[4];
               //print_r($params['departamento']);
               $this->Defunciones_model->InsertarDefunciones($params);
            }
      }
      $this->load->view('/Defunciones/cargar');
   }


   public function defunciones()
   {

      if (!empty($_POST)){
            
            $periodo = $_POST['periodo'];
            $deparamento = $_POST['departamento'];

             $params = array   (
                     'periodo'    => $periodo,
                     'departamento'    => $deparamento
                  );
     
      }else{

         $params = array   (
                     'periodo'    => array(0),
                     'departamento'    => array(0)
                  );
      }
      
      $res=$this->Defunciones_model->MostrarDatos($params);
      $data['registros']= json_encode($res);

      $restotal=$this->Defunciones_model->MostrarDatosTotales($params);
      $data['registros_totales']= json_encode($restotal);

      $res=$this->Matricula_model->ListarPeriodo();
      $data['periodos']= json_encode($res);

      $res=$this->Matricula_model->ListarDepartamento();
      $data['departamentos']= json_encode($res);

      $this->load->view('/dependencias');
      $this->load->view('/Usuarios/educacion_inicio');
      $this->load->view('/Defunciones/defunciones', $data);
      $this->load->view('/Usuarios/educacion_pie');
   }


}
?>