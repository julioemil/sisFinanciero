<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_ciudad
 *
 * @author HP
 * Estado=Ciudad
 * Ciudad= Provincia
 */
class model_ciudad extends CI_Model {
    //put your code here
    
    public function getCiudad() {
        $this->db->order_by('nomb_ciudad', 'asc');
        $departamentos = $this->db->get('ciudad');
        
        if($departamentos->num_rows() > 0){
            return $departamentos->result();
        }
    }
    
    public function getProvincia($idCiudad) {
        $this->db->where('id_ciudad', $idCiudad);
        $this->db->order_by('nomb_provincia', 'asc');
        $provincias = $this->db->get('provincia');
        
        if($provincias->num_rows() > 0){
            return $provincias->result();
        }
    }
    
     public function getDistrito($idProvincia) {
        $this->db->where('id_provincia', $idProvincia);
        $this->db->order_by('nomb_distrito', 'asc');
        $distritos = $this->db->get('distrito');
        
        if($distritos->num_rows() > 0){
            return $distritos->result();
        }
    }
    
    public function getNombProvincia($idProvincia){
        $this->db->where('id_provincia', $idProvincia);
        $provincias = $this->db->get('provincia');
        if($provincias->num_rows() > 0){
            return $provincias ->result();
        }
    }
    
    public function getNombDistrito($idDistrito){
        $this->db->where('id_distrito', $idDistrito);
        $provincias = $this->db->get('distrito');
        if($provincias->num_rows() > 0){
            return $provincias ->result();
        }
    }
}
