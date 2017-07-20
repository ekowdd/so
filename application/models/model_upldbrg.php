<?php

class model_upldbrg extends CI_Model
{

    var $tabel = 'product';

    function __construct()
    {
        parent::__construct();
    }

    //fungsi untuk menampilkan semua data dari tabel database
    function get_allimage($store)
    {
        $this->db->from($this->tabel);
        $query = $this->db->where('store_name', $store)->get();

        return $query->result();

    }

    function get_product_by_barcode($barcode){
        $qry = $this->db->query("SELECT * FROM product WHERE barcode='$barcode'");

        return $qry->result();
    }
    //fungsi insert ke database
    function get_insert($data)
    {
        $this->db->insert($this->tabel, $data);
        return TRUE;
    }

    public function getDataRevisi()
    {
        return $this->db->query("SELECT * FROM product
                              LEFT JOIN revisi ON product.product_code = revisi.product_code")->result();
    }

    public function get_barang_join($barcode){

        return $this->db->query("
            SELECT * FROM product 
                LEFT JOIN store 
                ON product.store_name = store.store_name
                WHERE product.barcode='$barcode'
                    ")->result();
    }


}

?>