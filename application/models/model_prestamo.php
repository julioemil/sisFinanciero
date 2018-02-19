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
class model_prestamo extends CI_Model
{
    public function ListarPrestamos1()
    {
        $this->db->order_by('idPrestamo ASC');
        return $this->db->get('prestamo')->result();
    }
    public function ListarPrestamos2()
    {
        $this->db->select('idPrestamo, producto, plazo, fechaInicio, fechaFinal, tasaInteres, capital, deuda, u.NOMBRE AS nombreU,
                p.estado,
                c.nombres as nombreC');
        $this->db->from('prestamo p');
        $this->db->join('cliente c','c.idCliente = p.idCliente');
        $this->db->join('usuarios u','u.ID = p.idUsuario');
        return $this->db->get()->result();
    }
    public function crearPrestamo($data){
     	/*Nos aseguramos si realizamos todo o no*/
        $this->db->trans_start();
     	$this->db->insert('prestamo',$data);
        $this->db->trans_complete();	
     }
     
     function BuscarID($id){
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->get('prestamo');
        return $query->result();	
	}
     /*
     public function ExisteEmail($email){
        $this->db->from('cliente');
        $this->db->where('email',$email);
        return $this->db->count_all_results();
     }
     public function ExisteDni($dni){
        $this->db->from('cliente');
        $this->db->where('dni',$dni);
        return $this->db->count_all_results();
     }*/
    
}