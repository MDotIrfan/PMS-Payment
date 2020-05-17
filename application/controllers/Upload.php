<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->view('upload_form');
    }

    function do_upload() {
        $this->load->helper('url');
        $id = $this->input->post('id');

        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx';
        $config['file_name'] = 'SLS'.$id;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
            $id = $this->input->post('id');

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
                'id_pekerjaan' =>  $id,
                'status' => 'Menunggu PO',
                'file_selesai' => 'SLS'.$id
            );

            $this->m_pms->updateFile($id, $data);
            redirect('fl/menunggupo');
        }
    }

}

?>