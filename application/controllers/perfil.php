<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller{
    protected $datos=array();

    public function __construct(){
        parent::__construct();
        $this->load->model("tablaprimera_model");
        $this->load->model("resultados_model");
    }
    public function index(){
        redirect("perfil/favorito");
    }

    public function resultados(){ 
        if(!$this->session->userdata("usuario_id")){
            $this->session->set_flashdata("OP","PROHIBIDO");
            redirect("auth/index");
        }else{
            if(!($this->session->userdata("rol")==1)){
                redirect("principal");
            }else{
                $this->load->library("form_validation"); 
                $datos["todosresultados"]=$this->resultados_model->listar();
                $this->form_validation->set_rules("dia","dia","required");
                $this->form_validation->set_rules("fecha","fecha","required|greater_than[0]"); 
                $this->form_validation->set_rules("equipo_l","equipo local","required|differs[equipo_v]");
                $this->form_validation->set_rules("goles_l","goles del local","required|is_natural"); 
                $this->form_validation->set_rules("equipo_v","equipo visitante","required");
                $this->form_validation->set_rules("goles_v","goles del visitante","required|is_natural");
                if($this->form_validation->run()===FALSE){ 
                    $datos['equipos']=$this->tablaprimera_model->listar_equipos();
                    $this->load->view("resultados",$datos);
                }else{
                    $dia=set_value("dia");
                    $fecha=set_value("fecha");
                    $equipo_l=set_value("equipo_l"); 
                    $goles_l=set_value("goles_l");
                    $equipo_v=set_value("equipo_v");
                    $goles_v=set_value("goles_v");
                    $local=$this->tablaprimera_model->obtener_por_id($equipo_l);
                    $visitante=$this->tablaprimera_model->obtener_por_id($equipo_v);
    
                    if($goles_l==$goles_v){ //empataron
                        $nuevosdatos1=array();
                        $nuevosdatos1["puntos"]=$local["puntos"]+1;
                        $nuevosdatos1["jugados"]=$local["p_jugados"]+1;
                        $nuevosdatos1["ganados"]=$local["p_ganados"];
                        $nuevosdatos1["empatados"]=$local["p_empatados"]+1;
                        $nuevosdatos1["perdidos"]=$local["p_perdidos"];
                        $nuevosdatos1["goles_favor"]=$local["goles_favor"]+$goles_l;
                        $nuevosdatos1["goles_contra"]=$local["goles_contra"]+$goles_v;
                        $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                        $this->tablaprimera_model->modificar_por_id($equipo_l,$nuevosdatos1);
    
                        $nuevosdatos2=array();
                        $nuevosdatos2["puntos"]=$visitante["puntos"]+1;
                        $nuevosdatos2["jugados"]=$visitante["p_jugados"]+1;
                        $nuevosdatos2["ganados"]=$visitante["p_ganados"];
                        $nuevosdatos2["empatados"]=$visitante["p_empatados"]+1;
                        $nuevosdatos2["perdidos"]=$visitante["p_perdidos"];
                        $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]+$goles_v;
                        $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]+$goles_l;
                        $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                        $this->tablaprimera_model->modificar_por_id($equipo_v,$nuevosdatos2);
    
                        $datos["dia"]=$dia;
                        $datos["fecha"]=$fecha;
                        $datos["local"]=$equipo_l;
                        $datos["goles_local"]=$goles_l;
                        $datos["visitante"]=$equipo_v;
                        $datos["goles_visitante"]=$goles_v;
                        $this->resultados_model->agregar($datos);
    
                        $this->session->set_flashdata("OP","OK");
                        redirect("perfil/resultados");
    
                    }else{
                        if($goles_l>$goles_v){ //gano local
                            $nuevosdatos1=array();
                            $nuevosdatos1["puntos"]=$local["puntos"]+3;
                            $nuevosdatos1["jugados"]=$local["p_jugados"]+1;
                            $nuevosdatos1["ganados"]=$local["p_ganados"]+1;
                            $nuevosdatos1["empatados"]=$local["p_empatados"];
                            $nuevosdatos1["perdidos"]=$local["p_perdidos"];
                            $nuevosdatos1["goles_favor"]=$local["goles_favor"]+$goles_l;
                            $nuevosdatos1["goles_contra"]=$local["goles_contra"]+$goles_v;
                            $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                            $this->tablaprimera_model->modificar_por_id($equipo_l,$nuevosdatos1);
        
                            $nuevosdatos2=array();
                            $nuevosdatos2["puntos"]=$visitante["puntos"];
                            $nuevosdatos2["jugados"]=$visitante["p_jugados"]+1;
                            $nuevosdatos2["ganados"]=$visitante["p_ganados"];
                            $nuevosdatos2["empatados"]=$visitante["p_empatados"];
                            $nuevosdatos2["perdidos"]=$visitante["p_perdidos"]+1;
                            $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]+$goles_v;
                            $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]+$goles_l;
                            $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                            $this->tablaprimera_model->modificar_por_id($equipo_v,$nuevosdatos2);
    
                            $datos=array();
                            $datos["dia"]=$dia;
                            $datos["fecha"]=$fecha;
                            $datos["local"]=$equipo_l;
                            $datos["goles_local"]=$goles_l;
                            $datos["visitante"]=$equipo_v;
                            $datos["goles_visitante"]=$goles_v;
                            $this->resultados_model->agregar($datos);
    
                            $this->session->set_flashdata("OP","OK");
                            redirect("perfil/resultados");
    
                        }else{ //gano visitante
                            $nuevosdatos1=array();
                            $nuevosdatos1["puntos"]=$local["puntos"];
                            $nuevosdatos1["jugados"]=$local["p_jugados"]+1;
                            $nuevosdatos1["ganados"]=$local["p_ganados"];
                            $nuevosdatos1["empatados"]=$local["p_empatados"];
                            $nuevosdatos1["perdidos"]=$local["p_perdidos"]+1;
                            $nuevosdatos1["goles_favor"]=$local["goles_favor"]+$goles_l;
                            $nuevosdatos1["goles_contra"]=$local["goles_contra"]+$goles_v;
                            $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                            $this->tablaprimera_model->modificar_por_id($equipo_l,$nuevosdatos1);
        
                            $nuevosdatos2=array();
                            $nuevosdatos2["puntos"]=$visitante["puntos"]+3;
                            $nuevosdatos2["jugados"]=$visitante["p_jugados"]+1;
                            $nuevosdatos2["ganados"]=$visitante["p_ganados"]+1;
                            $nuevosdatos2["empatados"]=$visitante["p_empatados"];
                            $nuevosdatos2["perdidos"]=$visitante["p_perdidos"];
                            $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]+$goles_v;
                            $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]+$goles_l;
                            $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                            $this->tablaprimera_model->modificar_por_id($equipo_v,$nuevosdatos2);

                            $datos=array();
                            $datos["dia"]=$dia;
                            $datos["fecha"]=$fecha;
                            $datos["local"]=$equipo_l;
                            $datos["goles_local"]=$goles_l;
                            $datos["visitante"]=$equipo_v;
                            $datos["goles_visitante"]=$goles_v;
                            $this->resultados_model->agregar($datos);
                            
                            $this->session->set_flashdata("OP","OK");
                            redirect("perfil/resultados");
                        }
                    }
                   
                    $this->load->view("resultados",$datos);
                }    
            }

        }

    }


    public function favorito(){
        if(!$this->session->userdata("usuario_id")){ 
            $this->session->set_flashdata("OP","PROHIBIDO");
            redirect("auth/index");
        }else{
            $this->load->library("form_validation");
            $this->load->model('equipos_model');
            $this->form_validation->set_rules('equipo_fav','equipo favorito','required');
            if($this->form_validation->run() === FALSE){ 
                $datos=array();
                $datos["equipos"]=$this->equipos_model->listar();
                $this->load->view("favorito",$datos);
            }else{
                $equipo_fav=set_value("equipo_fav");
                $usuario=($this->session->userdata("usuario_id"));
                $this->load->model("usuarios_model");
                $this->usuarios_model->modificar_equipo($usuario,$equipo_fav);

                $this->session->set_userdata("equipo_fav",$equipo_fav);
                $this->session->set_flashdata("OP","OK");
                redirect("perfil/favorito");
            }

        }
    }

    public function eliminar($id=null){
        $resultado_id=intval($id);
        if($resultado_id>0){
            $resultado=$this->resultados_model->seleccionar_x_id($resultado_id); //dentro de $resultado estan los datos del resultado seleccionado
            $local=$this->tablaprimera_model->obtener_por_id($resultado["equipo_local"]); 
            $visitante=$this->tablaprimera_model->obtener_por_id($resultado["equipo_visitante"]); //en $local y $visitante deberian guardarse todos los datos de la tabla de los respectivos equipos

            if($resultado["goles_local"]==$resultado["goles_visitante"]){
                $nuevosdatos1=array();
                $nuevosdatos1["puntos"]=$local["puntos"]-1;
                $nuevosdatos1["jugados"]=$local["p_jugados"]-1;
                $nuevosdatos1["ganados"]=$local["p_ganados"];
                $nuevosdatos1["empatados"]=$local["p_empatados"]-1;
                $nuevosdatos1["perdidos"]=$local["p_perdidos"];
                $nuevosdatos1["goles_favor"]=$local["goles_favor"]-$resultado["goles_local"];
                $nuevosdatos1["goles_contra"]=$local["goles_contra"]-$resultado["goles_visitante"];
                $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                $this->tablaprimera_model->modificar_por_id($resultado["equipo_local"],$nuevosdatos1);

                $nuevosdatos2=array();
                $nuevosdatos2["puntos"]=$visitante["puntos"]-1;
                $nuevosdatos2["jugados"]=$visitante["p_jugados"]-1;
                $nuevosdatos2["ganados"]=$visitante["p_ganados"];
                $nuevosdatos2["empatados"]=$visitante["p_empatados"]-1;
                $nuevosdatos2["perdidos"]=$visitante["p_perdidos"];
                $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]-$resultado["goles_visitante"];
                $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]-$resultado["goles_local"];
                $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                $this->tablaprimera_model->modificar_por_id($resultado["equipo_visitante"],$nuevosdatos2);

            }else{
                if($resultado["goles_local"]>$resultado["goles_visitante"]){ //gano local
                    $nuevosdatos1=array();
                    $nuevosdatos1["puntos"]=$local["puntos"]-3;
                    $nuevosdatos1["jugados"]=$local["p_jugados"]-1;
                    $nuevosdatos1["ganados"]=$local["p_ganados"]-1;
                    $nuevosdatos1["empatados"]=$local["p_empatados"];
                    $nuevosdatos1["perdidos"]=$local["p_perdidos"];
                    $nuevosdatos1["goles_favor"]=$local["goles_favor"]-$resultado["goles_local"];
                    $nuevosdatos1["goles_contra"]=$local["goles_contra"]-$resultado["goles_visitante"];
                    $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                    $this->tablaprimera_model->modificar_por_id($resultado["equipo_local"],$nuevosdatos1);
    
                    $nuevosdatos2=array();
                    $nuevosdatos2["puntos"]=$visitante["puntos"];
                    $nuevosdatos2["jugados"]=$visitante["p_jugados"]-1;
                    $nuevosdatos2["ganados"]=$visitante["p_ganados"];
                    $nuevosdatos2["empatados"]=$visitante["p_empatados"];
                    $nuevosdatos2["perdidos"]=$visitante["p_perdidos"]-1;
                    $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]-$resultado["goles_visitante"];
                    $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]-$resultado["goles_local"];
                    $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                    $this->tablaprimera_model->modificar_por_id($resultado["equipo_visitante"],$nuevosdatos2);

                }else{ //gano visitante
                    $nuevosdatos1=array();
                    $nuevosdatos1["puntos"]=$local["puntos"];
                    $nuevosdatos1["jugados"]=$local["p_jugados"]-1;
                    $nuevosdatos1["ganados"]=$local["p_ganados"];
                    $nuevosdatos1["empatados"]=$local["p_empatados"];
                    $nuevosdatos1["perdidos"]=$local["p_perdidos"]-1;
                    $nuevosdatos1["goles_favor"]=$local["goles_favor"]-$resultado["goles_local"];
                    $nuevosdatos1["goles_contra"]=$local["goles_contra"]-$resultado["goles_visitante"];
                    $nuevosdatos1["diferencia"]=$nuevosdatos1["goles_favor"]-$nuevosdatos1["goles_contra"];
                    $this->tablaprimera_model->modificar_por_id($resultado["equipo_local"],$nuevosdatos1);
    
                    $nuevosdatos2=array();
                    $nuevosdatos2["puntos"]=$visitante["puntos"]-3;
                    $nuevosdatos2["jugados"]=$visitante["p_jugados"]-1;
                    $nuevosdatos2["ganados"]=$visitante["p_ganados"]-1;
                    $nuevosdatos2["empatados"]=$visitante["p_empatados"];
                    $nuevosdatos2["perdidos"]=$visitante["p_perdidos"];
                    $nuevosdatos2["goles_favor"]=$visitante["goles_favor"]-$resultado["goles_visitante"];
                    $nuevosdatos2["goles_contra"]=$visitante["goles_contra"]-$resultado["goles_local"];
                    $nuevosdatos2["diferencia"]=$nuevosdatos2["goles_favor"]-$nuevosdatos2["goles_contra"];
                    $this->tablaprimera_model->modificar_por_id($resultado["equipo_visitante"],$nuevosdatos2);

                }
        }
        $this->session->set_flashdata("OP","ELIMINADO");           
        $this->resultados_model->borrar($resultado_id);
        redirect("perfil/resultados");
    }
}
    public function reiniciar(){
        $this->tablaprimera_model->resetear();
        $this->resultados_model->borrartodo();

        $this->session->set_flashdata("OP","REINICIADO");
        redirect("perfil/resultados");
    }

    public function cambiarpass(){
        if(!$this->session->userdata("usuario_id")){ 
            $this->session->set_flashdata("OP","PROHIBIDO");
            redirect("auth/index");
        }else{
            $this->load->model("usuarios_model");
            $this->load->library("form_validation");
            $this->form_validation->set_rules("nueva_pass","contraseña","required|matches[repetir]");
            $this->form_validation->set_rules("repetir","repetir contraseña","required");
            if($this->form_validation->run() === FALSE ){
                $this->load->view("cambiarpass");
            }else{
                $user=$this->session->userdata("usuario_id");
                $pass=set_value("nueva_pass");
                $this->usuarios_model->cambiar_pass($user,$pass);
                
                $this->session->set_flashdata("OP","OK");
                redirect("perfil/cambiarpass");
            }
        }
    }
    
}