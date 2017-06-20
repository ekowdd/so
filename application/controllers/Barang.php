<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{

    var $limit = 10;
    var $offset = 10;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_upldbrg'); //load model model_upldgbr yang berada di folder model
        $this->load->helper(array('url')); //load helper url 

    }

    public function index($page = NULL, $offset = '', $key = NULL)
    {
        $data['query'] = $this->model_upldbrg->get_allimage(); //query dari model

        $this->load->view('home', $data); //tampilan awal ketika controller upload di akses
    }

    public function add()
    {
        //view yang tampil jika fungsi add diakses pada url
        $this->load->view('fupload');

    }

    public function insert()
    {
        $this->load->library('upload');
        $nmfile = "file_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width'] = '5000'; //lebar maksimum 5000 px
        $config['max_height'] = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if ($_FILES['filefoto']['name']) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $data = array(
                    'nama_file' => $gbr['file_name'],
                    'type' => $gbr['file_type'],
                    'product_code' => $this->input->post('product_code'),
                    'product_name' => $this->input->post('product_name'),
                    'barcode' => $this->input->post('barcode'),
                    'store_name' => $this->input->post('store_name'),
                    'quantity' => $this->input->post('quantity'),
                    'value' => $this->input->post('value'),
                    'total' => $this->input->post('total'),
                    'keterangan' => $this->input->post('keterangan')

                );

                $this->model_upldbrg->get_insert($data); //akses model untuk menyimpan ke database

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                $config2['new_image'] = './assets/hasil_resize/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib', $config2);

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
                }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('barang'); //jika berhasil maka akan ditampilkan view upload
            } else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('barang/add'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function updateProduct()
    {
        $pCode = $this->uri->segment(3);

    }

}
