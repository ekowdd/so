<?php

class model_store extends CI_Model{
    public function insert_store($data){
        return $this->db->insert('store',$data);
    }

    public function get_all_data_json(){
        return $this->db->get('store')->result();
    }
}