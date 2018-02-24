<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_cliente
 *
 * @author HP
 */
class model_cliente extends CI_Model
{
    public function ListarCliente()
    {
        $this->db->order_by('idCliente ASC');
        return $this->db->get('cliente')->result();
    }
    public function crearCliente($data){
     	/*Nos aseguramos si realizamos todo o no*/
        $this->db->trans_start();
     	$this->db->insert('cliente',$data);
        $this->db->trans_complete();	
     }
     public function ExisteEmail($email){
        $this->db->from('cliente');
        $this->db->where('email',$email);
        return $this->db->count_all_results();
     }
     public function ExisteDni($dni){
        $this->db->from('cliente');
        $this->db->where('dni',$dni);
        return $this->db->count_all_results();
     }
    function BuscarID($id){
        $query = $this->db->where('idCliente',$id);
        $query = $this->db->get('cliente');
        return $query->result();	
	}
    function BuscarNombre($id){

		$query = $this->db->where('idCliente',$id);
		$query = $this->db->get('cliente');
		return $query->result();
		
	}
    function Eliminar($id){
        $this->db->where('idCliente',$id);
        $this->db->delete('cliente');
		
	}
    function edit($data,$id){

		$this->db->where('idCliente',$id);
		$this->db->update('cliente',$data);	
	}
    
}
