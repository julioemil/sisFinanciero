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
     
     public function index(){

      $fechaInicio = $this->input->post("fechaInicio");
      $fechaFin = $this->input->post("fechaFin");
      if($this->input->post("buscar")){
        $prestamos = $this->model_prestamo->ListarPrestamos($fechaInicio,$fechaFin);
      }else{
        $prestamos = $this->model_prestamo->ListarPrestamos2();
      }

        
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $data['arrayprestamos'] = $prestamos;
          $data['fechaInicio'] = $fechaInicio;
          $data['fechaFin'] = $fechaFin;
          $data['fechaActual'] = date("Y")."-".date("m")."-".date("d");
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

  public function sumarDias()  {
      $periodo = $_POST['periodo'];
      $hoyYear = date("Y");
      $hoyMonth = date("m");
      $hoydate = date("d");

      $count = 0;
      while($count<30){
        
        if(checkdate($hoyMonth, $hoydate, $hoyYear)){
          $hoydate = $hoydate + 1;
        }else{
          if($hoyMonth==12)
          {
            $hoyYear = $hoyYear + 1;
            $hoyMonth = 1;
            $hoydate = 1;
          }else{
            $hoyMonth = $hoyMonth + 1;
            $hoydate = 1;  
          }
          
        }
        $count = $count + 1;
      }

      $hoy = $hoyYear.'/'.$hoyMonth.'/'.$hoydate;
      $date = new DateTime($hoy);
      echo $date->format('Y-m-d');
  }

  public function cadena()  {
      $periodo = $_POST['periodo'];
      $hoyYear = date("Y");
      $hoyMonth = date("m");
      $hoydate = date("d");

      while($periodo>0){
        if($hoyMonth + $periodo>12){
          $meses = $hoyMonth + $periodo;
          $hoyYear = $hoyYear + intval($meses / 12);
          $periodo = $periodo - 12;          
          $hoyMonth = $meses % 12;
          $periodo = 0;
        }else{
          $hoyMonth = $hoyMonth + $periodo;          
          $periodo = 0;
        }
      }

      $hoy = $hoyYear.'/'.$hoyMonth.'/'.$hoydate;
      $date = new DateTime($hoy);
      echo $date->format('Y-m-d');
  }

  public function sumarDiasMes(){
    $periodo = $_POST['periodo'];
    $hoy   = date("Y")."-".date("m")."-".date("d");

    $dias = 30 * $periodo;

    $nuevafecha = strtotime('+'.$dias.' day', strtotime($hoy));
    $nuevafecha = date('Y-m-j', $nuevafecha);
     
    echo $nuevafecha;
  }
  
  public function sumarDiasMesPagoPC(){
    $periodo = $_POST['periodo'];
    $fechaPagoPC = $_POST['fechaPagoPC'];

    $dias = 30 * $periodo;

    $nuevafecha = strtotime('+'.$dias.' day', strtotime($fechaPagoPC));
    $nuevafecha = date('Y-m-j', $nuevafecha);
     
    echo $nuevafecha;
  }

  public function detalle($id){
        $this->Seguridad();
        $this->load->view('header');
        $result = $this->model_prestamo->listarPrestamoDetalle($id);
        $dataPrestamo['arrayprestamo'] = $result;
        if($result->producto=='diario'){
          $this->load->view('view_prestamo_detalle_diario',$dataPrestamo);  
        }
        if($result->producto=='mensual'){
          $this->load->view('view_prestamo_detalle',$dataPrestamo);  
        }        
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
        if($this->model_prestamo->verPrestamoDetalle($id)==3){
          redirect("prestamo?limitePrestamos=true".$this->model_prestamo->verPrestamoDetalle($id));
        }else{
          $dataPrestamo = $this->model_prestamo->verPrestamoDetalle($id);
          $hoy   = date("Y")."-".date("m")."-".date("d");
          //$dataPrestamo['hoy'] = $hoy;

          ///////////idPrestamo, producto, plazo, deuda, tasaInteres, tasaInteresMoratorio, c.nombres as nombreC, c.apellidos as apellidoC, fechaFinal as fechaVencimiento

          $pagosExtemporaneos = $this->model_prestamo->verDetallePagoExtemporaneo($id);

          $pagoExtem = $pagosExtemporaneos['pagoExtemporaneos'];
          $cantidad = $pagosExtemporaneos['cantidadPagos'];
          

          
          $prestamoData = array(
            'idPrestamo' => $dataPrestamo['idPrestamo'],
            'producto' => $dataPrestamo['producto'],
            'plazo' => $dataPrestamo['plazo'],
            'deuda' => $this->obtenerDeudaTotal($dataPrestamo['deuda'], $dataPrestamo['capital'], $dataPrestamo['tasaInteres'], $dataPrestamo['tasaInteresMoratorio'], $dataPrestamo['fechaVencimiento'], $dataPrestamo['sumaPagos'], $pagoExtem, $cantidad),
            'tasaInteres' => $dataPrestamo['tasaInteres'],
            'tasaInteresMoratorio' => $dataPrestamo['tasaInteresMoratorio'],
            'nombreC' => $dataPrestamo['nombreC'],
            'apellidoC' => $dataPrestamo['apellidoC'],
            'fechaVencimiento' => $dataPrestamo['fechaVencimiento'],
            'hoy' => $hoy,
          );
          
          $data['arrayprestamo'] = $prestamoData;
          //

          $this->load->view('view_prestamo_reprogramo',$data);
          $this->load->view('footer');
        }   
    }

    public function obtenerDeudaTotal($deuda, $capital, $interesCompensatorio, $interesMoratorio, $fechaVencimiento, $sumaPagos, $pagoExtemporaneo, $cantidad){

      $hoy   = date("Y")."-".date("m")."-".date("d");

      $TEAC = pow((1 + $interesCompensatorio/100),12) - 1;
      $TEDC = pow((1 + $TEAC),1/360) - 1;

      $TEAM = pow((1 + $interesMoratorio/100),12) - 1;
      $TEDM = pow((1 + $TEAM),1/360) - 1;

      $deudaGeneral = $capital*pow((1+$TEDC),30);

      $deuda = $deudaGeneral - ($sumaPagos - $pagoExtemporaneo);

      $interes = ($interesCompensatorio/100)/(1 + $interesCompensatorio/100)*$deuda;
      $capital = $deuda-$interes;
      
      $dias = $this->diferenciaFechas($hoy,$fechaVencimiento);

      $interesC = ($capital*pow((1+$TEDC),$dias)-$capital);
      $interesM = ($capital*pow((1+$TEDM),$dias)-$capital);
      $deudaTotal = $deuda + $interesC + $interesM;

      if($cantidad > 0){
        $deudaTotal = $deudaTotal - $pagoExtemporaneo;
      }
      return round($deudaTotal,2);
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

    public function obtenerDatosPrestamo(){
      $hoy   = date("Y")."-".date("m")."-".date("d");

      $idPrestamo = $this->input->post("idPrestamo");
      $data = $this->model_prestamo->verPrestamoDetalleMoroso($idPrestamo);

      $pagosExtemporaneos = $this->model_prestamo->verDetallePagoExtemporaneo($idPrestamo);

      $pagoExtem = $pagosExtemporaneos['pagoExtemporaneos'];
      $cantidad = $pagosExtemporaneos['cantidadPagos'];

      foreach ($data as $d) {
        $prestamoData = array(
          'idPrestamo' => $d->idPrestamo,
          'producto' => $d->producto,
          'capital' => $d->capital,
          'plazo' => $d->plazo,
          'deuda' => $d->deuda,
          'tasaInteres' => $d->tasaInteres,
          'tasaInteresMoratorio' => $d->tasaInteresMoratorio,
          'nombreC' => $d->nombreC,
          'apellidoC' => $d->apellidoC,
          'fechaVencimiento' => $d->fechaVencimiento,
          'fechaActual' => $hoy,
          'diasVencidos' => $this->diferenciaFechas($hoy,$d->fechaVencimiento),
          'sumaPagos' => $d->sumaPagos,
          'pagosExtemporaneo' => $pagoExtem,
          'cantidad' => $cantidad,
        );
      }
      
      echo json_encode($prestamoData);
    }

    public function diferenciaFechas($fechaActual, $fechaVencimiento){
      $datetime1 = new DateTime($fechaActual);
      $datetime2 = new DateTime($fechaVencimiento);
      $interval = $datetime1->diff($datetime2);
      return $interval->format("%a");
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