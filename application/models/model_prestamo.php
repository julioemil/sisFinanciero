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
        $this->db->select('p.idPrestamo, p.producto, plazo, p.fechaInicio, p.fechaFinal, tasaInteres, capital, p.deuda, u.NOMBRE AS nombreU,
                p.estado,
                c.nombres as nombreC, (select count(*)  from reprograma_prestamo rp where rp.idPrestamo = p.idPrestamo) as cantidad');
        $this->db->from('prestamo p');
        $this->db->join('cliente c','c.idCliente = p.idCliente');
        $this->db->join('usuarios u','u.ID = p.idUsuario');
        //$this->db->join('reprograma_prestamo rp','rp.idPrestamo = p.idPrestamo');
        return $this->db->get()->result();
    }
    public function crearPrestamo($data){
     	/*Nos aseguramos si realizamos todo o no*/
        $this->db->trans_start();
     	$this->db->insert('prestamo',$data);
        $this->db->trans_complete();	
    }

    public function crearReprogramaPrestamo($data,$id){
        /*Nos aseguramos si realizamos todo o no*/

        //$this->db->select('count(*)');
        $this->db->from('reprograma_prestamo');
        $this->db->where('idPrestamo',$id);
        $result = $this->db->get()->num_rows();
        if($result == 0){
            $this->db->trans_start();
            $data['vez'] = 1;
            $this->db->insert('reprograma_prestamo',$data);
            $this->db->trans_complete();
        }
        else{
            $this->db->trans_start();
            $data['vez'] = $result + 1;
            $this->db->insert('reprograma_prestamo',$data);
            $this->db->trans_complete();
        }
        return $result;
    }
     
    function BuscarID($id){
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->get('prestamo');
        return $query->result();	
	}

    public function listarPrestamoDetalle($id){
        $query = $this->db->where('idPrestamo',$id);
        $query = $this->db->get('prestamo');
        return $query->row();
    }

    public function listarReprogramaDetalle($idPrestamo,$vez){
        $query = $this->db->where('idPrestamo',$idPrestamo);
        $query = $this->db->where('vez',$vez);
        $query = $this->db->get('reprograma_prestamo');
        return $query->row();
    }

    public function verPrestamoDetalle($id){
        $this->db->select('count(*) as cantidad');
        $this->db->from('reprograma_prestamo');
        $this->db->where('idPrestamo',$id);
        $result = $this->db->get()->row();
        $idUltimoPrestamo =$result->cantidad;
        if($idUltimoPrestamo==0){
            $this->db->select('idPrestamo, deuda, c.nombres as nombreC, c.apellidos as apellidoC');
            $this->db->from('prestamo p');
            $this->db->join('cliente c','c.idCliente = p.idCliente');
            $this->db->where('p.idPrestamo',$id);
            return $this->db->get()->result();            
        }else{
            $this->db->select('p.idPrestamo, rp.deuda, c.nombres as nombreC, c.apellidos as apellidoC');
            $this->db->from('prestamo p');
            $this->db->join('cliente c','c.idCliente = p.idCliente');
            $this->db->join('reprograma_prestamo rp','rp.idPrestamo = p.idPrestamo');
            $this->db->where('rp.idPrestamo',$id);
            $this->db->where('rp.vez',$idUltimoPrestamo);
            return $this->db->get()->result();    
        }        
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