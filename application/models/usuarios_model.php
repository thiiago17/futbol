<?php
class usuarios_model extends CI_Model{
    protected $table="usuarios";
    protected $pk="usuario_id";

    function check_login($user="",$pass=""){
        $this->db->select($this->pk);
        $this->db->where("usuario",$user);
        $this->db->where("contraseña",$pass);
        $this->db->limit(1);
        $res= $this->db->get($this->table);
        if($res->num_rows()){ 
            $temp=$res->row_array(); 
            return $temp["usuario_id"]; 
        }else{
            return false;
        }
    }

    function obtener_por_id($id=""){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();  
    }

    function modificar_equipo($id="",$equipo_id=""){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $this->db->set("equipo_fav",$equipo_id);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    function crear_usuario($u="",$p=""){
        $this->db->set("usuario",$u);
        $this->db->set("contraseña",$p);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    function cambiar_pass($id=false,$nueva_pass=""){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $this->db->set("contraseña",$nueva_pass);
        $this->db->update($this->table);
        return $this->db->affected_rows();

    }
}





?>