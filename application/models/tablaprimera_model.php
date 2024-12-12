<?php
class tablaprimera_model extends CI_Model{
    protected $table="tablaprimera";
    protected $pk="equipo_id";
    
    public function listar(){
        $this->db->select("*");
        $this->db->order_by("puntos","DESC");
        $this->db->order_by("diferencia_gol","DESC");
        $this->db->order_by("goles_favor","DESC");
        $res=$this->db->get($this->table);
        return $res->result_array();
    }

    public function listar_equipos(){
        $this->db->select("*");
        $this->db->order_by("equipo_id","ASC");
        $res=$this->db->get($this->table);
        return $res->result_array();
    }

    function obtener_por_id($id=""){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();
    }


    function modificar_por_id($id=false,$datos=array()){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $this->db->set("puntos",$datos["puntos"]);
        $this->db->set("p_jugados",$datos["jugados"]);
        $this->db->set("p_ganados",$datos["ganados"]);
        $this->db->set("p_empatados",$datos["empatados"]);
        $this->db->set("p_perdidos",$datos["perdidos"]);
        $this->db->set("goles_favor",$datos["goles_favor"]);
        $this->db->set("goles_contra",$datos["goles_contra"]);
        $this->db->set("diferencia_gol",$datos["diferencia"]);
        $this->db->update($this->table);
        return $this->db->affected_rows();
        
    }

    public function resetear(){
        $this->db->set("puntos",0);
        $this->db->set("p_jugados",0);
        $this->db->set("p_ganados",0);
        $this->db->set("p_empatados",0);
        $this->db->set("p_perdidos",0);
        $this->db->set("goles_favor",0);
        $this->db->set("goles_contra",0);
        $this->db->set("diferencia_gol",0);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }


}
?>