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
class cliente extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_usuarios');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->model('model_cliente');
          $this->load->model('model_ciudad');
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
          $data['arraycliente'] = $this->model_cliente->ListarCliente();         
          $this->load->view('view_cliente', $data);
          $this->load->view('footer');
     }
     /* public function nuevo(){
        $this->Seguridad();
    	$this->load->view('header');
        $dataUsuario['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
        $this->load->view('view_nuevo_cliente', $dataUsuario);
        $this->load->view('footer');
    } */
    
    function nuevo(){
                $this->Seguridad();
		$hoy   = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
		$this->validaCampos();
		if($this->form_validation->run() == TRUE)
                {
				//Verificamos si existe el email
			$VerifyExist = $this->model_cliente->ExisteDni($this->input->post("dni"));
                        if($VerifyExist==0)
                        {
                             ////Recibimos todo los campos por array nos lo envia codeigther
                             //guardamos los registros
                             /*$data= array(
                             'nombres'=>$this->input->post('nombres'),
                             'apellidos'=>$this->input->post('apellidos'),
                             'email'=>$this->input->post('email'),
                              );*/
                             $data = $this->input->post();
                             $data["fechaCreacion"] = $hoy;
                             $this->model_cliente->crearCliente($data);
                             redirect("cliente?save=true");
                        }
                        
                        if($VerifyExist>0)
                        {
                             $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">DNI Duplicado</div>');
                             $this->load->view('header');
                             $dataUsuario['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
                             $this->load->view('view_nuevo_cliente',$dataUsuario);
                             $this->load->view('footer');
                        }
			
		}else
                {
			  $this->load->view('header');   
                          $dataUsuario['datos_departamento'] = $this->model_ciudad->getCiudad();
                          $dataUsuario['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
			  $this->load->view('view_nuevo_cliente',$dataUsuario);
			  $this->load->view('footer');
		} 
    }
        function validaCampos()
    {
		/*Campos para validar que no esten vacio los campos*/
                 $this->form_validation->set_rules("nombres", "Nombres", "trim|required");
		 $this->form_validation->set_rules("apellidos", "Apellidos", "trim|required");
                 $this->form_validation->set_rules("dni", "Dni", "trim|required");
                 $this->form_validation->set_rules("direccion", "Direccion", "trim|required");
                 $this->form_validation->set_rules("direccionNegocio", "DireccionNegocio", "trim|required");
		 $this->form_validation->set_rules("estado", "Estado", "callback_select_estado");
                 $this->form_validation->set_rules("distrito", "Distrito", "callback_select_distrito");
                 $this->form_validation->set_rules("provincia", "Provincia", "callback_select_provincia");
                 $this->form_validation->set_rules("departamento", "Departamento", "callback_select_departamento");
                 $this->form_validation->set_rules("distritoNegocio", "DistritoNegocio", "callback_select_distrito");
                 $this->form_validation->set_rules("provinciaNegocio", "ProvinciaNegocio", "callback_select_provincia");
                 $this->form_validation->set_rules("departamentoNegocio", "DepartamentoNegocio", "callback_select_departamento");
                 $this->form_validation->set_rules("telefono", "Telefono", "trim|required");
                 $this->form_validation->set_rules("fechaNacimiento", "FechaNacimiento", "trim|required");
                 $this->form_validation->set_rules("sexo", "Sexo", "callback_select_sexo");
                 $this->form_validation->set_rules("idUsuario", "idUsuario", "callback_select_usuario");
                 $this->form_validation->set_rules("oficinaAfiliacion", "OficinaAfiliacion", "callback_select_oficina");
    }
    public function consultaProvincia($ciudades) {
        $idDepartamento = $this->input->post('idDepartamento');
        if($idDepartamento){
            $ciudades = $this->model_ciudad->getProvincia($idDepartamento);
            echo '<option value="0">Seleccione Provincia</option>';
            foreach($ciudades as $fila){
            echo '<option value="'. $fila->id_provincia.'">'.$fila->nomb_provincia.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Provincia</option>';
        }
        }
         
        public function consultaDistrito() {
        $idProvincia = $this->input->post('idProvincia');
        if($idProvincia){
            $ciudades = $this->model_ciudad->getDistrito($idProvincia);
            echo '<option value="0">Seleccione Distrito</option>';
            foreach($ciudades as $fila){
                echo '<option value="'. $fila->id_distrito.'">'.$fila->nomb_distrito.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Distrito</option>';
        }
        }
        
        public function consultaProvinciaNegocio($ciudades) {
        $idDepartamentoNegocio = $this->input->post('idDepartamentoNegocio');
        if($idDepartamentoNegocio){
            $ciudades = $this->model_ciudad->getProvincia($idDepartamentoNegocio);
            echo '<option value="0">Seleccione Provincia</option>';
            foreach($ciudades as $fila){
            echo '<option value="'. $fila->id_provincia.'">'.$fila->nomb_provincia.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Provincia</option>';
        }
        }
         
        public function consultaDistritoNegocio() {
        $idProvinciaNegocio = $this->input->post('idProvinciaNegocio');
        if($idProvinciaNegocio){
            $ciudades = $this->model_ciudad->getDistrito($idProvinciaNegocio);
            echo '<option value="0">Seleccione Distrito</option>';
            foreach($ciudades as $fila){
                echo '<option value="'. $fila->id_distrito.'">'.$fila->nomb_distrito.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Distrito</option>';
        }
        }
    
        function select_sexo($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_sexo', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}    
        function select_usuario($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_usuario', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	 function select_distrito($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_distrito', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
        function select_provincia($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_provincia', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
        function select_departamento($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_departamento', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
         function select_oficinaAfiliacion($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_oficinaAfiliacion', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
        
	function select_estado($campo)
	{
		// Validamos Estatus
		if($campo=="0"){
			$this->form_validation->set_message('select_estado', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}
        
        function eliminar($id = NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "cliente";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('idCliente');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("cliente");
			}else{
                                $this->model_cliente->Eliminar($id_eliminar);
				redirect("cliente?delete=true");
			}
		}else{
                        $data['datos_departamento'] = $this->model_ciudad->getCiudad();
			$data['arraycliente'] = $this->model_cliente->BuscarID($id);
			if (empty($data['arraycliente'])){
				$data['Modulo']  = "cliente";
				$data['Error']   = "**Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_cliente',$data);
				$this->load->view('footer');
			}
		}
	}
    
    	function editar($id = NULL){
		
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "cliente";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->validaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_cliente->edit($datos_update,$id);
				redirect('cliente?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
                        $data['datos_departamento'] = $this->model_ciudad->getCiudad();
			$data['datos_cliente'] = $this->model_cliente->BuscarID($id);
                        $data['arrayusuarios'] = $this->model_usuarios->ListarUsuarios();
			if (empty($data['datos_cliente'])){
				$data['Modulo']  = "cliente";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header'); 
				$this->load->view('view_nuevo_cliente',$data);
				$this->load->view('footer');
			}
		}
		
	}

          public function listado($id){
          $this->Seguridad();
          $this->load->view('header');
          $data['clientes'] = $this->model_cliente->BuscarNombre($id);    
          $this->load->view('view_listado_cliente', $data);
          $this->load->view('footer');
         }
         
}
