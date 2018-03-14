<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cobranza
 *
 * @author HP
 */
class cobranza extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
          $this->load->model('model_usuarios');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->model('model_cliente');
          $this->load->model('model_cobranza');
          
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
          $data['arraycobranza'] = $this->model_cobranza->ListarCobranza1();         
          $this->load->view('view_cobranza', $data);
          $this->load->view('footer');
     }
     
     
     public function nuevo($id = null){
         
        $this->Seguridad();
        $this->validaCampos();
        if($this->form_validation->run() == TRUE)
            {
            
            $hoy   = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
            $data = $this->input->post();
            $data["fechaCobranza"] = $hoy;
            $this->model_cobranza->crearCobranza($data);
            redirect("cobranza?save=true");
            }
        else{
            
                $id=$this->uri->segment(3);
                $data['arrayprestamo']= $this->model_cobranza->buscarID($id);
                $this->load->view('header');
                 $this->load->view('view_nuevo_cobranza', $data);
        	$this->load->view('footer');
        }             
        }

       function validaCampos()
    {
		/*Campos para validar que no esten vacio los campos*/
                 $this->form_validation->set_rules("idPrestamo", "idPrestamo", "trim|required");
                 $this->form_validation->set_rules("pago", "Pago", "trim|required");
		 $this->form_validation->set_rules("saldo", "Saldo", "trim|required");
                 $this->form_validation->set_rules("nRecibo", "nRecibo", "trim|required");
    }
    
    function listado($id = null){
                $this->Seguridad();
                $id=$this->uri->segment(3);
                $data['arraycobranza']=$this->model_cobranza->getPago($id);
                $data['arraycobranza1']=$this->model_cobranza->getPago1($id);
                $data['arraycobranza2']=$this->model_cobranza->getPago2($id);
                $data['arraycobranza3']=$this->model_cobranza->getPago3($id);
                
                //$data['arrayprestamo']  = $this->model_cobranza->BuscarID($id);
                //$data['arrayusuario']  = $this->model_cobranza->getUsuario($id);
                $data['arrayusuario']  = $this->model_cobranza->getUsuarioPrestamoCobranza($id);
                $this->load->view('header');
                $this->load->view('view_listado_cobranza', $data);
        	$this->load->view('footer');
    }
    
}
