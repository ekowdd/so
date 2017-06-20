<?php

/**
 *
 */
class Revisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_revisi', 'RM');
    }

    public function insert_rev()
    {
        $data = array(
            'revisi_id' => rand(10000, 99999),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'store_name' => $this->input->post('store_name'),
            'store_lead' => $this->input->post('store_lead'),
            'nik' => $this->input->post('nik'),
            'quantity' => $this->input->post('quantity'),
            'value' => $this->input->post('value'),
            'total' => $this->input->post('total')
        );

        $response = $this->RM->insert_rev($data);
        if ($response) {
            echo json_encode(array('status' => true, 'msg' => $response));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'No Data founds'));
        }
    }

    public function get_all_data_json()
    {
        echo json_encode(array('status' => true, 'msg' => $this->RM->get_data_all_json()));
    }

    public function update_rev()
    {
        $id = $this->uri->segment(3);

    }

    public function json_data()
    {
        $data = array(
            'id' => 1,
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd'
        );
        echo json_encode($data);
    }
}
