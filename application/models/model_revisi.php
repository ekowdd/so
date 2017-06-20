<?php

/**
 *
 */
class model_revisi extends CI_Model
{
    public function insert_rev($data)
    {
        return $this->db->insert('revisi', $data);
    }

    public function get_data_all_json()
    {
        $json_data = $this->db->get('revisi');
        return $json_data->result();
    }

}