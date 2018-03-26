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
        $this->db->select('idPrestamo, fechaInicio, fechaFinal, tasaInteres, vez, capital, deuda, cuota, u.NOMBRE AS nombreU,
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
        $query = $this->db->where('vez',0);
        $query=$this->db->get();
        return $query->result();	  
    }
       function getPago1($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('cobranza');
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->where('vez',1);
        $query=$this->db->get();
        return $query->result();	  
    }
    function getPago2($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('cobranza');
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->where('vez',2);
        $query=$this->db->get();
        return $query->result();	  
    }
    function getPago3($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('cobranza');
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->where('vez',3);
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
  function Usuario($id){
        $query =  $this->db->select('*');
        $query = $this->db->from('usuarios');
        $query = $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->row();      
    }
    

    
    function getUsuarioPrestamoCobranza($id)
    {
        $query =  $this->db->select('*');
        $query = $this->db->from('prestamo p');
        $query = $this->db->join('usuarios u','u.ID=p.idUsuario');
        $query = $this->db->join('cliente c','c.idCliente=p.idCliente');
        $query = $this->db->where('idPrestamo',$id);
        $query=$this->db->get();
        return $query->result();
    }
    
    function listaCobranzaPagadas()
    {
        $this->db->select('*');
        $this->db->from('cobranza co');
        $this->db->join('prestamo p','p.idPrestamo = co.idPrestamo');
        $this->db->join('cliente c','c.idCliente = p.idCliente');
        $this->db->join('usuarios u','u.ID = p.idUsuario');
        $this->db->or_where('saldo <', 0.4);
        $this->db->group_by('co.idPrestamo');
        return $this->db->get()->result();
        
    }
    function listaCobranzaPendientes()
    {
        $this->db->select('*');
        $this->db->from('prestamo p');
        $this->db->join('cliente c','c.idCliente = p.idCliente');
        $this->db->join('usuarios u','u.ID = p.idUsuario');
        return $this->db->get()->result();
            }
   
    function getPrueba($id){
        $query =  $this->db->select(' idPrestamo, saldo, max(fechaCobranza) as fecha');
        $query = $this->db->from('cobranza');
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->where('vez',0);
        $query=$this->db->get();
        return $query->result();
    }
    
    function  getPagoSaldo($id,$vez){
            $this->db->select('saldo');
            $this->db->from('cobranza');
            $this->db->where('idPrestamo',$id);
            $this->db->where('vez',$vez);
            $this->db->order_by('idCobranza','DESC');
            $this->db->limit(1);
            return $this->db->get()->result();   
    }
    
}
