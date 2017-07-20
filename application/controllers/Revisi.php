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
            'revisi_id' => rand(100000000, 999999999),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'store_name' => $this->input->post('store_name'),
            'store_lead' => $this->input->post('store_lead'),
            'tanggal'=>$this->input->post('tanggal'),
            'jam'=>$this->input->post('jam'),
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

        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'store_name' => $this->input->post('store_name'),
            'store_lead' => $this->input->post('store_lead'),
            'tanggal'=>$this->input->post('tanggal'),
            'jam'=>$this->input->post('jam'),
            'nik' => $this->input->post('nik'),
            'quantity' => $this->input->post('quantity'),
            'value' => $this->input->post('value'),
            'total' => $this->input->post('total')
        );

        $response = $this->RM->update_rev_models($data);
        if ($response) {
            $res['status'] = true;
            $res['msg']=$response;
            echo json_encode(array($res);
        }else{
            $res['status'] = false;
            $res['msg'] = 'Data not found';
            echo json_encode($res);
        }

    }
    public function getDataJson_Join(){
        $data = $this->RM->get_json_join();
        if ($data){
            $res['msg'] = $data;
            echo json_encode($res);
        }else{
            $res['msg'] = 'Data not founds..';
            echo json_encode($res,JSON_UNESCAPED_INTEGER);
        }
    }
    public function getDataJson_Join_fix(){
        $data = $this->RM->get_json_join_fix();
        if ($data){
            $res['msg'] = $data;
            echo json_encode($res);
        }else{
            $res['msg'] = 'Data not founds..';
            echo json_encode($res);
        }
    }

    public function getData()
    {
      $data = array(
        'nama'=>'ACI',
        'usia'=>24,
        'alamat'=>'jalan jalan',
        'status'=>'?'
      );


      echo json_encode($data);
    }

}
