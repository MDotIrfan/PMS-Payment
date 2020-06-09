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
        $config['allowed_types'] = 'pdf|docx|zip|rar';
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
                'file_selesai' => $result
            );

            $this->m_pms->updateFile($id, $data);
            $this->kirimemail($id);
            redirect('fl/menunggupo');
        }
    }

    public function kirimemail($id=NULL){
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$data['fl'] = $this->db->get_where('freelance', ['id' => $data['p']['id_fl']])->row_array();
		$data['pm'] = $this->db->get_where('pm', ['id' => $data['p']['id_pm']])->row_array();
		// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'muhammadirfan.9f@gmail.com',  // Email gmail
            'smtp_pass'   => 'weseisa123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@star.com', 'star.com');

        // Email penerima
        $this->email->to($data['pm']['email_pm']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('uploads/'.$data['p']['file_selesai']));

        // Subject email
        $this->email->subject('Pekerjaan Baru');

        // Isi email
        $this->email->message("Pekerjaan ".$data['p']['nama_pekerjaan']." telah selesai dikerjakan oleh ".$data['fl']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}


}

?>