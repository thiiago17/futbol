<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller{ 
    protected $datos=array();

    public function index(){
        $this->load->model("equipos_model");
        $datos["equipos"]=$this->equipos_model->listar();
        $this->load->view('principal',$datos);
    }
    public function tablaprimera(){
        $this->load->model('tablaprimera_model');
        $datos['tablaprimera']=$this->tablaprimera_model->listar();
        $this->load->view("tablaprimera",$datos);
    }

    public function tuequipo(){
        if(!$this->session->userdata("usuario_id")){
            redirect("principal/equiposinlogin");
        }else{
            $datos["equipo_fav"]=$this->session->userdata("equipo_fav");
            $this->load->model("resultados_model");
            $datos["resultados"]=$this->resultados_model->listar_por_id($datos["equipo_fav"]);
            $this->load->view("tuequipo",$datos);
        }
    }

    public function equiposinlogin(){
        $this->load->view("equiposinlogin");
    }

    public function listaresultados(){
        $this->load->model("resultados_model");
        $datos["todosresultados"]=$this->resultados_model->listar();
        $this->load->view("listaresultados",$datos);
    }

    public function primeranacional(){
        $this->load->view("primeranacional");
    }
}