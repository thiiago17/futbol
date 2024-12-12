<?php
class resultados_model extends CI_Model{
    protected $table="resultados";
    protected $pk="resultado_id";

    public function listar(){ 
        $this->db->select('resultados.resultado_id, resultados.dia, resultados.fecha, resultados.goles_local, resultados.goles_visitante, equipos_local.equipo AS equipo_local, equipos_visitante.equipo AS equipo_visitante, equipos_local.equipo_id AS local_id, equipos_visitante.equipo_id AS visitante_id'); 
        $this->db->join("equipos as equipos_local", "resultados.equipo_local = equipos_local.equipo_id", "inner", false);
        $this->db->join("equipos as equipos_visitante", "resultados.equipo_visitante = equipos_visitante.equipo_id", "inner", false); 
        $this->db->order_by("fecha","ASC");
        $this->db->order_by("dia","ASC");
        $this->db->order_by($this->pk,"ASC");
        $res=$this->db->get($this->table);
        return $res->result_array();
    }
    public function agregar($datos=array()){ 
        $this->db->set("dia",$datos["dia"]);
        $this->db->set("fecha",$datos["fecha"]);
        $this->db->set("equipo_local",$datos["local"]);
        $this->db->set("goles_local",$datos["goles_local"]);
        $this->db->set("equipo_visitante",$datos["visitante"]);
        $this->db->set("goles_visitante",$datos["goles_visitante"]);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function listar_por_id($id=null){
        if($id==null){
            return false;
        }
        $this->db->select('resultados.resultado_id, resultados.dia, resultados.fecha, resultados.goles_local, resultados.goles_visitante, equipos_local.equipo AS equipo_local, equipos_visitante.equipo AS equipo_visitante, equipos_local.equipo_id AS local_id, equipos_visitante.equipo_id AS visitante_id'); 
        $this->db->join("equipos as equipos_local", "resultados.equipo_local = equipos_local.equipo_id", "inner", false);
        $this->db->join("equipos as equipos_visitante", "resultados.equipo_visitante = equipos_visitante.equipo_id", "inner", false); 
        $this->db->where("(equipo_local = $id OR equipo_visitante = $id)");
        $this->db->order_by("fecha","ASC");
        $this->db->order_by("dia","ASC");
        $res=$this->db->get($this->table);
        return $res->result_array();
    }

    public function seleccionar_x_id($id=""){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();
    }

    public function borrar($id=""){ 
        $this->db->where($this->pk,$id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function borrartodo(){
        $this->db->where(true,true); 
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
?>