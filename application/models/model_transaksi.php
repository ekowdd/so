<?php

/**
 *
 */
class model_transaksi extends CI_Model
{
    public function save_trens($data)
    {
        return $this->db->insert('transaksi_so', $data);
    }

    public function get_all_data()
    {
        return $this->db->get('transaksi_so')->result();
    }
}