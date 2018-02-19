<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_usuarios extends CI_Model {
    
    public function ListarUsuarios()
    {
        $this->db->order_by('ID ASC');
        return $this->db->get('usuarios')->result();
    }
    
    public function ExisteEmail($email){
        $this->db->from('usuarios');
        $this->db->where('EMAIL',$email);
        return $this->db->count_all_results();
     }
     
     public function guardarUsuarios($arrayCliente)
     {
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('usuarios', $arrayCliente);
     	$this->db->trans_complete();	
     }
     
	 function BuscarID($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('usuarios');
		return $query->result();
		
	}
        function BuscarNombre($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('usuarios');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('ID',$id);
		$this->db->update('usuarios',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('usuarios');
		
	}
	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
	function DesactivaPermisos($id){
		$this->db->where('ID_USUARIO',$id);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 1));
	}
	function ExistePermiso($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		return $this->db->count_all_results();
	}
	function ActualizaPermiso($id,$id_menu){
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 0));
	}
	function AgregaPermiso($arraypermisos){
		$this->db->trans_start();
     	$this->db->insert('permisosmenu', $arraypermisos);
     	$this->db->trans_complete();
	}
        
        public function getCantidadGenero()
       {
             /*$query=$this->db
                     ->select("u.ID as ID_USUARIO, u.NOMBRE, u.APELLIDOS, u.SEXO,e.ID as ID_ENCUESTA, e.FECHA_ENCUESTA")    
                     ->from("usuarios as u")
                     ->join("encuesta as e", "e.ID_USUARIO = u.ID","inner")
                     ->get();
             return $query->result();

              *               */
            $query=$this->db
                     ->select("u.ID as ID_USUARIO, u.NOMBRE, u.APELLIDOS, u.SEXO,e.ID as ID_ENCUESTA, e.ACTIVIDAD_LABORAL, e.GRADO_FORMACION, e.METODO_DOCENTE, e.ACTIVIDAD_ACADEMICA, e.GRADO_TRABAJO, e.JUSTIFICACION, e.CORREO_ELECTRONICO, e.FECHA_ENCUESTA, c.NOMBRE as NOMBREC")    
                     ->from("usuarios as u")
                     ->join("carrera as c", "u.ID_CARRERA = c.ID","inner")
                     ->join("encuesta as e", "u.ID = e.ID_USUARIO","inner")
                     ->get();
             return $query->result();
       }    
}
?>