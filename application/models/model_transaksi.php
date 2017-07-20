<?php

/**
 *
 */
class Model_transaksi extends CI_Model
{
    public function save_trens($data)
    {
        return $this->db->insert('transaksi_so', $data);
    }

    public function get_all_data()
    {
        return $this->db->get('transaksi_so')->result();
    }

    public function get_data_trans_by_store($data){
    	return $this->db->where('store',$data)
    				->get('transaksi')->result();
    }

    public function get_rugi(){
    	return $this->db->query("SELECT * FROM transaksi WHERE total !='$total'")->result();
    }
}