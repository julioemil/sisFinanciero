<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_cobranza
 *
 * @author HP
 */
class model_cobranza extends CI_Model{
    //put your code here

    public function ListarCobranza()
    {
        $this->db->order_by('idCobranza ASC');
        return $this->db->get('cobranza')->result();
    }
    public function crearCobranza($data){
     	/*Nos aseguramos si realizamos todo o no*/
        $this->db->trans_start();
     	$this->db->insert('cobranza',$data);
        $this->db->trans_complete();	
     }    
    public function ListarCobranza1()
    {
        $this->db->select('idPrestamo, fechaInicio, fechaFinal, tasaInteres, capital, deuda, cuota, u.NOMBRE AS nombreU,
                p.estado,
                c.nombres as nombresC,
                c.apellidos as apellidosC');
        $this->db->from('prestamo p');
        $this->db->join('cliente c','c.idCliente = p.idCliente');
        $this->db->join('usuarios u','u.ID = p.idUsuario');
        return $this->db->get()->result();
    }
    function BuscarID($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('prestamo p');
        $query = $this->db->join('cliente c','c.idCliente=p.idCliente');
        $query = $this->db->where('idPrestamo',$id);
        $query=$this->db->get();
        return $query->result();	  
    }
    function getPago($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('cobranza');
        $query = $this->db->where('idPrestamo',$id);
        $query=$this->db->get();
        return $query->result();	  
    }
    function getUsuario($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('prestamo p');
        $query = $this->db->join('usuarios u','u.ID=p.idUsuario');
        $query = $this->db->where('idPrestamo',$id);
        $query=$this->db->get();
        return $query->result();	  
    }

}
