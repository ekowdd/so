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
            $res['status'] = true;
            $res['message'] = 'Successfully';
            $res['data'] = $response;
            echo json_encode($res);
        } else {
            $res['status'] = false;
            $res['message'] = 'Unsuccessfully';
            $res['data'] = 'Not Founds Data';
            echo json_encode($res);
        }
    }

    public function get_all_user_json()
    {
        echo json_encode(array('msg' => $this->ML->get_all_user_json()));
    }

    public function getUserById(){
        $nik = $this->input->get('nik');

        $response = $this->ML->get_all_data_by_nik($nik);
        if ($response) {
            echo json_encode(array('msg'=>$response));
        }else{
            $res['msg'] = 'Not founds';
            echo json_encode($res);
        }
    }
    public function index()
    {
        $nik = $this->input->post('nik');
        $password = md5($this->input->post('password'));

        if ($nik =null && $password ==null) {
          redrect('user');
        }else{
            $response = $this->ML->cekUserInfo($nik, $password);
            if ($response) {
               echo "Success";
            } else {
                echo "Unsucces";
            }
        }

        
    }
}