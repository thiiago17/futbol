<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model');
    }
    public function index(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("usuario","usuario","required|trim|strtolower");
        $this->form_validation->set_rules("password","contraseña","required");
        if($this->form_validation->run()===FALSE){
            $this->load->view('login');
        }else{
            $usuario=set_value("usuario");
            $pass=set_value("password");
            $id=$this->usuarios_model->check_login($usuario,$pass);
            if($id){ 
                $u=$this->usuarios_model->obtener_por_id($id);
                if($u["estado"]==1){
                    $this->session->set_userdata("usuario_id",$u["usuario_id"]);
                    $this->session->set_userdata("usuario",$u["usuario"]);
                    $this->session->set_userdata("rol",$u["rol"]);
                    $this->session->set_userdata("equipo_fav",$u["equipo_fav"]);
                    redirect("principal");
                }else{
                    $this->session->set_flashdata("OP","INACTIVO");
                    redirect("auth/index");
                }
            }else{
                $this->session->set_flashdata("OP","INCORRECTO");
                redirect("auth/index");
            }
        }

    }
    public function logout(){
        $this->session->sess_destroy();
        redirect("principal");
    }

    public function registro(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("usuario","usuario","required");
        $this->form_validation->set_rules("password","contraseña","required|matches[repetir_pass]");
        $this->form_validation->set_rules("repetir_pass","contraseña","required");
        if($this->form_validation->run() === FALSE){
            $this->load->view("registrarse");
        }else{
            $usuario=set_value("usuario");
            $pass=set_value("password");
            $this->usuarios_model->crear_usuario($usuario,$pass);
            $this->session->set_flashdata("OP","CREADO");
            redirect("auth/index");
        }

    }
}