<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author HP
 */
class prestamo extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_usuarios');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->model('model_cliente');
          $this->load->model('model_prestamo');
    }
    function Seguridad()
     {
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     
     public function index()
     {
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $data['arrayprestamos'] = $this->model_prestamo->ListarPrestamos2();         
          $this->load->view('view_prestamo', $data);
          $this->load->view('footer');
     }
     public function nuevo(){
        $this->Seguridad();
    	$this->load->view('header');
        $hoy   = date("Y")."-".date("m")."-".date("d");
        $dataCliente['hoy'] = $hoy;
        $dataCliente['arrayclientes'] = $this->model_cliente->ListarCliente();
        $dataCliente['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
        $this->load->view('view_nuevo_prestamo', $dataCliente);
        $this->load->view('footer');
    } 
    
    function insertarDatos(){
                $this->Seguridad();
		$hoy   = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
		$this->validaCampos();
		if($this->form_validation->run() == TRUE)
        {
            $data = $this->input->post();
            $capital = $this->input->post('capital');
            $tasaInteres = $this->input->post('tasaInteres');
            $plazo = $this->input->post('plazo');
            if($this->input->post('producto')=="mensual"){
              $cuota = $capital*(pow((1 + $tasaInteres/100), $plazo)*$tasaInteres/100)/(pow((1 + $tasaInteres/100), $plazo) - 1);
              $data["cuota"] = $cuota;
            }

            if($this->input->post('producto')=="mesCampana"){
              $cuota = $capital*(pow((1 + $tasaInteres/100), $plazo));
              $data["cuota"] = $cuota;
            }
            $data["vez"]=0;
            $this->model_prestamo->crearPrestamo($data);
            redirect("prestamo?save=true");			
		}else
                {
			$this->load->view('header');                   
            $dataCliente['arrayclientes'] = $this->model_cliente->ListarCliente();
            $dataCliente['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
			$this->load->view('view_nuevo_prestamo',$dataCliente);
			$this->load->view('footer');
		} 
    }
    function validaCampos()
    {
		/*Campos para validar que no esten vacio los campos*/
        $this->form_validation->set_rules("producto", "Producto", "trim|required");
		    $this->form_validation->set_rules("plazo", "Plazo", "trim|required");
        $this->form_validation->set_rules("fechaInicio", "Fecha Inicio", "trim|required");
        $this->form_validation->set_rules("fechaFinal", "Fecha Final", "trim|required");
        $this->form_validation->set_rules("tasaInteres", "Tasa Interes", "trim|required");
        $this->form_validation->set_rules("capital", "Capital", "trim|required");
        $this->form_validation->set_rules("deuda", "Deuda", "trim|required");
    		$this->form_validation->set_rules("tipo", "Tipo", "callback_select_tipo");
    		$this->form_validation->set_rules("estado", "Estado", "callback_select_estado");
        /*$this->form_validation->set_rules("distrito", "Distrito", "callback_select_distrito");
        $this->form_validation->set_rules("provincia", "Provincia", "callback_select_provincia");
        $this->form_validation->set_rules("departamento", "Departamento", "callback_select_departamento");
        $this->form_validation->set_rules("telefono", "Telefono", "trim|required");
        $this->form_validation->set_rules("sexo", "Sexo", "callback_select_sexo");
        $this->form_validation->set_rules("oficinaAfiliacion", "OficinaAfiliacion", "callback_select_oficina");*/
    }
    
    
        
	function select_estado($campo)
	{
		// Validamos Estatus
		if($campo=="NONE"){
			$this->form_validation->set_message('select_estado', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}


  public function cadena()  {
      $periodo = $_POST['periodo'];
      $hoyYear = date("Y");
      $hoyMonth = date("m");
      $hoydate = date("d");

      while($periodo>0){
        if($hoyMonth + $periodo>12){
          $hoyYear = $hoyYear + 1;
          $periodo = $periodo - 12;
        }else{
          $hoyMonth = $hoyMonth + $periodo;          
          $periodo = 0;
        }
      }

      $hoy = $hoyYear.'/'.$hoyMonth.'/'.$hoydate;
      $date = new DateTime($hoy);
      echo $date->format('Y-m-d');
    }

    public function detalle($id){
        $this->Seguridad();
        $this->load->view('header');
        $dataPrestamo['arrayprestamo'] = $this->model_prestamo->listarPrestamoDetalle($id);
        $this->load->view('view_prestamo_detalle',$dataPrestamo);
        $this->load->view('footer');
    }

    public function detallaReprograma($idPrestamo, $vez){
        $this->Seguridad();
        $this->load->view('header');
        $dataPrestamo['arrayprestamo'] = $this->model_prestamo->listarReprogramaDetalle($idPrestamo,$vez);
        $this->load->view('view_prestamo_detalle',$dataPrestamo);
        $this->load->view('footer');
    }


    public function reprogramar($id){
        $this->Seguridad();
        $this->load->view('header');
        $dataPrestamo['arrayprestamo'] = $this->model_prestamo->verPrestamoDetalle($id);
        $hoy   = date("Y")."-".date("m")."-".date("d");
        $dataPrestamo['hoy'] = $hoy;
        $this->load->view('view_prestamo_reprogramo',$dataPrestamo);
        $this->load->view('footer');
    }


    function insertarReprograma(){
    $this->Seguridad();
    $hoy   = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
    $this->validaCampos();
    if($this->form_validation->run() == TRUE)
        {

            $data = array(
              'producto' => $this->input->post('producto'),
              'fechaInicio' => $this->input->post('fechaInicio'),
              'fechaFinal' => $this->input->post('fechaFinal'),
              'capital' => $this->input->post('capital'),
              'tasaInteres' => $this->input->post('tasaInteres'),
              'deuda' => $this->input->post('deuda'),
              'cuota' => $this->input->post('cuota'),
              'plazo' => $this->input->post('plazo'),
              'idPrestamo' => $this->input->post('idPrestamo'),
              'vez' => '1',
              );
            $id = $this->input->post('idPrestamo');
            //$data = $this->input->post();
            $capital = $this->input->post('capital');
            $tasaInteres = $this->input->post('tasaInteres');
            $plazo = $this->input->post('plazo');

            //La condicion permite almacenar los decimales
            if($this->input->post('producto')=="mensual"){
              $cuota = $capital*(pow((1 + $tasaInteres/100), $plazo)*$tasaInteres/100)/(pow((1 + $tasaInteres/100), $plazo) - 1);
              $data["cuota"] = $cuota;
            }

            if($this->input->post('producto')=="mesCampana"){
              $cuota = $capital*(pow((1 + $tasaInteres/100), $plazo));
              $data["cuota"] = $cuota;
            }
            
            $this->model_prestamo->crearReprogramaPrestamo($data, $id);
            redirect("prestamo?save=true");     
    }else
                {
      $this->load->view('header');                   
            $dataCliente['arrayclientes'] = $this->model_cliente->ListarCliente();
            $dataCliente['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
      $this->load->view('view_nuevo_prestamo',$dataCliente);
      $this->load->view('footer');
    } 
    }
    
    /*
    public function insertarDatos()
        {
        $this->Seguridad();
        $data= array(
            'nombres'=>$this->input->post('nombres'),
            'apellidos'=>$this->input->post('apellidos'),
        );
        $this->load->view('header');
        $this->model_cliente->crearCliente($data);
        $this->load->view('footer');
        redirect("cliente");
        }
    */     
         
}