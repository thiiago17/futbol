<?php
class equipos_model extends CI_Model{
    protected $table="equipos";
    protected $pk="equipo_id";

    public function listar(){
        $this->db->select("*");
        $this->db->order_by("equipo","ASC");
        $res=$this->db->get($this->table);
        return $res->result_array();
    }
}






?>