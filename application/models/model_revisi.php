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

    public function get_json_join()
    {
        return $this->db->query("SELECT * FROM product
                                          LEFT JOIN revisi ON product.product_code = revisi.product_code
                                          LEFT JOIN store ON store.store_name = revisi.store_name
                                          LEFT JOIN user ON user.nik = revisi.nik
                                          WHERE product.quantity > revisi.qty AND product.quantity > revisi.qty
                                          ")->result();
    }
    public function get_json_join_fix(){
        return $this->db->query("SELECT * FROM product
                                          LEFT JOIN revisi ON product.product_code = revisi.product_code
                                          LEFT JOIN store ON store.store_name = revisi.store_name
                                          LEFT JOIN user ON user.nik = revisi.nik
                                          WHERE product.quantity = revisi.qty AND product.quantity = revisi.qty
                                          ")->result();
    }

    public function update_rev_models($id){
        return $this->db->update($data)->where('revisi_id',$id);
         
    }
}
