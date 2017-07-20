<?php

class Store extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_store', 'MS');
    }

    public function add_store()
    {
        $data = array(
            'store_id' => $this->input->post('store_id'),
            'store_name' => $this->input->post('store_id'),
            'store_lead' => $this->input->post('store_id'),
            'address' => $this->input->post('store_id')
        );

        $response = $this->MS->insert_store($data);
        if ($response) {
            echo json_encode(array('msg' => $response));
        } else {
            echo json_encode(array('msg' => 'Data Not founds'));
        }
    }

    public function get_all_json_data()
    {
        echo json_encode(array('msg' => $this->MS->get_all_data_json()));
    }

    public function nik_random()
    {
        echo rand(100000000, 999999999);
    }

    public function getStorName(){
        echo json_encode(array('msg'=>$this->MS->get_all_data_json()));
    }
}