<?php

class model_user extends CI_Model
{
    public function add_users($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_all_user_json()
    {
        return $this->db->get('user')->result();
    }

    public function cekUserInfo($nik, $password)
    {
        return $this->db->where('nik', $nik)
            ->where('password', $password)
            ->get('user');
    }

    public function get_all_data_by_nik($nik)
    {
        return $this->db->where('nik', $nik)
            ->get('user');
    }
}