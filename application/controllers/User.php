<?php

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user', 'ML');
    }

    public function add_usr()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'password' => md5($this->input->post('password'))
        );

        $response = $this->ML->add_users(array('msg' => $data));
        if ($response) {
            echo json_encode($response);
        } else {
            echo json_encode(array('msg' => 'Data not founds'));
        }
    }

    public function get_all_user_json()
    {
        echo json_encode(array('msg' => $this->ML->get_all_user_json()));
    }

    public function loginUser()
    {
        $nik = $this->input->post('nik');
        $password = md5($this->input->post('password'));


        $response = $this->ML->cekUserInfo($nik, $password);
        if ($response) {
            echo json_encode(array('msg' => $this->ML->get_all_data_by_nik($nik)));
        } else {
            echo json_encode(array('msg' => 'No User and password..!!'));
        }
    }
}