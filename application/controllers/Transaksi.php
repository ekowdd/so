<?php

/**
 *
 */
class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_transaksi', 'MT');
    }

    public function save_trensaksi()
    {
        $data = array(
            'trans_code' => rand(10000, 99999),
            'revisi_id' => $this->input->post('revisi_id'),
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'store_name' => $this->input->post('store_name'),
            'store_lead' => $this->input->post('store_lead'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'quantity' => $this->input->post('quantity'),
            'value' => $this->input->post('value'),
            'total' => $this->input->post('total'),
            'missed' => $this->input->post('missed'),
            'total_value_missed' => $this->input->post('total_value_missed')
        );

        $response = $this->MT->save_trens($data);

        if ($response) {
            echo json_encode(array('status' => true, 'msg' => $response));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error'));
        }
    }

    public function get_data_all_json()
    {
        echo json_encode(array('status' => true, 'msg' => $this->MT->get_all_data()));
    }


    public function get_transaksi_by_store(){
        $store = $this->input->get('store');

    }

}