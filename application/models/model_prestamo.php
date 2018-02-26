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
        //(select count(*)  from reprograma_prestamo rp where rp.idPrestamo = p.idPrestamo) as cantidad'
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
    public function crearReprogramaPrestamo($data,$id){
        /*Nos aseguramos si realizamos todo o no*/

        $this->db->select('producto, capital, tasaInteres, fechaInicio, fechaFinal, plazo, vez');
        $this->db->from('prestamo');
        $this->db->where('idPrestamo',$id);
        $result = $this->db->get()->row();
        if($result->vez==0){
            $data['producto0'] = $result->producto;
            $data['capital0'] = $result->capital;
            $data['tasaInteres0'] = $result->tasaInteres;
            $data['fechaInicio0'] = $result->fechaInicio;
            $data['fechaFinal0'] = $result->fechaFinal;
            $data['plazo0'] = $result->plazo;
            $data['vez'] = $result->vez+1;
            $this->db->where('idPrestamo',$id);
            $this->db->update('prestamo',$data);
        }
        if($result->vez==1){
            $data['producto1'] = $result->producto;
            $data['capital1'] = $result->capital;
            $data['tasaInteres1'] = $result->tasaInteres;
            $data['fechaInicio1'] = $result->fechaInicio;
            $data['fechaFinal1'] = $result->fechaFinal;
            $data['plazo1'] = $result->plazo;
            $data['vez'] = $result->vez+1;
            $this->db->where('idPrestamo',$id);
            $this->db->update('prestamo',$data);
        }
        if($result->vez==2){
            $data['producto2'] = $result->producto;
            $data['capital2'] = $result->capital;
            $data['tasaInteres2'] = $result->tasaInteres;
            $data['fechaInicio2'] = $result->fechaInicio;
            $data['fechaFinal2'] = $result->fechaFinal;
            $data['plazo2'] = $result->plazo;
            $data['vez'] = $result->vez+1;
            $this->db->where('idPrestamo',$id);
            $this->db->update('prestamo',$data);
        }
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

    /*public function listarReprogramaDetalle($idPrestamo,$vez){
        $query = $this->db->where('idPrestamo',$idPrestamo);
        $query = $this->db->where('vez',$vez);
        $query = $this->db->get('reprograma_prestamo');
        return $query->row();
    }*/

    public function verPrestamoDetalle($id){
        //$this->db->select('count(*) as cantidad');
        $this->db->from('prestamo');
        $this->db->where('idPrestamo',$id);
        $query = $this->db->get()->row();
        if($query->vez==3){
            return $query->vez;
        }

        $this->db->from('cobranza');
        $this->db->where('idPrestamo',$id);
        $result = $this->db->get()->num_rows();
        //$idUltimoPrestamo =$result->cantidad;
        if($result==0){
            $this->db->select('idPrestamo, deuda, c.nombres as nombreC, c.apellidos as apellidoC');
            $this->db->from('prestamo p');
            $this->db->join('cliente c','c.idCliente = p.idCliente');
            $this->db->where('p.idPrestamo',$id);
            return $this->db->get()->result();            
        }else{
            $this->db->select('p.idPrestamo, saldo as deuda, c.nombres as nombreC, c.apellidos as apellidoC');
            $this->db->from('prestamo p');
            $this->db->join('cliente c','c.idCliente = p.idCliente');
            $this->db->join('cobranza co','co.idPrestamo = p.idPrestamo');
            $this->db->where('p.idPrestamo',$id);
            $this->db->order_by('idCobranza','DESC');
            $this->db->limit(1);
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