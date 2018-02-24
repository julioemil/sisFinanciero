<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima'); 

class usuarios extends CI_Controller
{
    
     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_usuarios');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->model('model_cliente');
          $this->load->model('model_ciudad');
          $this->load->library('export_excel');
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
          $data['usuarios'] = $this->model_usuarios->ListarUsuarios();         
          $this->load->view('view_usuarios', $data);
          $this->load->view('footer');
     }
        
     public function nuevo()
     {      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		
		$hoy   = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");		
		$this->validaCampos();
		if($this->form_validation->run() == TRUE)
                {
				//Verificamos si existe el email
			$VerifyExist = $this->model_usuarios->ExisteEmail($this->input->post("email"));
                        if($VerifyExist==0)
                        {
                             $usuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
                             $usuariosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
                             //guardamos los registros
                             $this->model_usuarios->guardarUsuarios($usuariosInsertar);
                             redirect("usuarios?save=true");
                        }
                        
                        if($VerifyExist>0)
                        {
                             $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Email Duplicado</div>');
                             $this->load->view('header');
                             $this->load->view('view_nuevo_usuario');
                             $this->load->view('footer');
                        }
			
		}else
                {  
                          $data['datos_departamento'] = $this->model_ciudad->getCiudad();
			  $this->load->view('header');   
			  $this->load->view('view_nuevo_usuario',$data);
			  $this->load->view('footer');
		} 
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
     
	 function validaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("nombre", "Nombres", "trim|required");
		 $this->form_validation->set_rules("apellidos", "Apellidos", "trim|required");
		 $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		 $this->form_validation->set_rules("fecha_nacimiento", "Fecha_nacimiento", "trim|required");
		 $this->form_validation->set_rules("apellidos", "Apellidos", "trim|required");
		 $this->form_validation->set_rules("estatus", "Estatus", "callback_select_estatus");
                 $this->form_validation->set_rules("telefono", "Telefono", "trim|required");
                 $this->form_validation->set_rules("direccion", "Direccion", "trim|required");
                 $this->form_validation->set_rules("sueldo", "Sueldo", "trim|required|decimal");                 
                 $this->form_validation->set_rules("sexo", "Sexo", "callback_select_sexo");
                 $this->form_validation->set_rules("dni", "Dni", "trim|required|integer|exact_length[8]");
                 $this->form_validation->set_rules("direccion", "Direccion", "trim|required");
                 $this->form_validation->set_rules("oficina", "Oficina", "callback_select_oficina");
                 $this->form_validation->set_rules("tipo", "Tipo", "callback_select_tipo");
                 $this->form_validation->set_rules("DEPARTAMENTO", "DEPARTAMENTO", "callback_select_DEPARTAMENTO");
                 $this->form_validation->set_rules("PROVINCIA", "PROVINCIA", "callback_select_PROVINCIA");
                 $this->form_validation->set_rules("DISTRITO", "DISTRITO", "callback_select_DISTRITO");
                 //$this->form_validation->set_rules("anioegreso","anioegreso","callback_checkDateFormat");    
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
	 function select_tipo($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_tipo', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
         function select_oficina($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_oficina', '*Campo Obligatorio');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
        
	function select_estatus($campo)
	{
		// Validamos Estatus
		if($campo=="0"){
			$this->form_validation->set_message('select_estatus', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}
        function select_DEPARTAMENTO($campo)
	{
		// Validamos Estatus
		if($campo=="0"){
			$this->form_validation->set_message('select_DEPARTAMENTO', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}
        function select_PROVINCIA($campo)
	{
		// Validamos Estatus
		if($campo=="0"){
			$this->form_validation->set_message('select_PROVINCIA', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}
        function select_DISTRITO($campo)
	{
		// Validamos Estatus
		if($campo=="0"){
			$this->form_validation->set_message('select_DISTRITO', '*Campo Obligatorio');
			return false;
		} else{
		// 
		return true;
		}
	}
	 public function editar($id = NULL){
		
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
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
				$id_insertado = $this->model_usuarios->edit($datos_update,$id);
				redirect('usuarios?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
                        $data['datos_departamento'] = $this->model_ciudad->getCiudad();
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
                               
				$this->load->view('header'); 
				$this->load->view('view_nuevo_usuario',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('ID');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("usuarios");
			}else{
                                $this->model_usuarios->Eliminar($id_eliminar);
				redirect("usuarios?delete=true");
			}
		}else{
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete',$data);
				$this->load->view('footer');
			}
		}
	}
	public function password($id=NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
		if ($this->input->post()) {
			$this->form_validation->set_rules("PASSWORD", "Password", "trim|required");
			$this->form_validation->set_rules("PASSWORD1", "Confirmar Password", "trim|required");
			if ($this->form_validation->run() == TRUE){
			    $password  = $this->input->post('PASSWORD');
				$password1 = $this->input->post('PASSWORD1');
				if($password==$password1){
				    
                                        $password_update  = array('PASSWORD' => MD5($password));
                                        $this->model_usuarios->edit($password_update,$id);
					redirect('usuarios?password=true');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-error text-center">La Contraseña No coincide</div>');
                    $this->load->view('header');
					$this->load->view('view_password',$data);
					$this->load->view('footer');
				}
			}else{
				$this->load->view('header');
				$this->load->view('view_password',$data);
				$this->load->view('footer');
			}
			
		}else{
			
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_password',$data);
				$this->load->view('footer');
			}
		}
	
	}
	public function permisos($id = NULL){
	   if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			    $id              = $this->input->post("ID");
				$permission_data = $this->input->post("permissions")!=false ? $this->input->post("permissions"):array();
				/*APLICAMOS UPDATE*/
				$this->model_usuarios->DesactivaPermisos($id);
				foreach($permission_data as $Permisos){
				    $ExistePermiso = $this->model_usuarios->ExistePermiso($id,$Permisos);
					/*EXISTE PERMISO ACTUALIZAMOS, SI NO INSERTAMOS*/
				    if($ExistePermiso==1){
						$this->model_usuarios->ActualizaPermiso($id,$Permisos);
					}else{
						$AgregaPermiso  = array(
							'ID_USUARIO' => $id,
							'ID_MENU'    => $Permisos
						);
						$this->model_usuarios->AgregaPermiso($AgregaPermiso);
					}
				}
				/*Si el usuario que se asigno permisos es el que esta logeado entonces refrescamos la sesion*/
				$IdUserLogin = $this->session->userdata('ID');
				if($IdUserLogin==$id){
					$Menu = $this->model_login->PermisosMenu($id);
					$this->session->set_userdata($Menu);
				}
				
				redirect('usuarios?permisos=true');
		}else{
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$EstatusPermiso = array();
				$DescripcionPerm= array();
				$idMenus		= array();
				$CountPermiso 	= 0;
			    $MenuCargardo 	= $this->model_usuarios->MenuCompleto();
				foreach($MenuCargardo as $Menu){
					$MiMenu = $this->model_usuarios->MiMenu($id,$Menu->ID);
					$EstatusPermiso[$CountPermiso] = array();
					$DescripcionPerm[$CountPermiso]= array();
					$idMenus[$CountPermiso]		   = array();
					$EstatusPermiso[$CountPermiso] = $MiMenu;
					$DescripcionPerm[$CountPermiso]= $Menu->DESCRIPCION;
					$idMenus[$CountPermiso]		   = $Menu->ID;
					$CountPermiso = $CountPermiso + 1;
					
				}
				$data['estatus_menu']     = $EstatusPermiso;
				$data['descripcion_menu'] = $DescripcionPerm;
				$data['id_menu']		  = $idMenus;
				$this->load->view('header');
				$this->load->view('view_permisos',$data);
				$this->load->view('footer');
			}
		}
		
	 }
         
         public function listado($id){
          $this->Seguridad();
          $this->load->view('header');
          $data['usuarios'] = $this->model_usuarios->BuscarNombre($id);    
          $this->load->view('view_listado_usuario', $data);
          $this->load->view('footer');
         }
         		
	

	public function excel($id){
		$result = $this->model_usuarios->getUsuario($id);
		$this->export_excel->to_excel($result, 'lista_de_empleado');
	}
        
        public function excels(){
		$result = $this->model_usuarios->getUsuarios();
		$this->export_excel->to_excel($result, 'lista_de_empleados');
	}
  
         

}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */