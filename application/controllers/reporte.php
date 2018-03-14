<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporte
 *
 * @author JULIO-PC
 */
class reporte extends CI_Controller{
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
          $this->load->model('model_cobranza');
    }
    function Seguridad()
     {
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     
      public function index()
     {
                $this->load->view('header');
                $data['arraycobranza'] = $this->model_cobranza->listaCobranzaPagadas();
                $this->load->view('view_reporte_prestamo_pagado',$data);
        	$this->load->view('footer');
     }
     
     public function prestamoPendiente()
     {
                $this->load->view('header');
                $data['arraycobranza'] = $this->model_cobranza->listaCobranzaPendientes();
                $this->load->view('view_reporte_prestamo_pendiente',$data);
        	$this->load->view('footer');
     }
    
}
