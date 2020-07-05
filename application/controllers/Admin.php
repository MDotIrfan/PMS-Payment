<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_pms');
		$this->load->helper('url_helper');	
	}

	public function home($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterpekerjaan();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/'.$page,$data);
		$this->load->view('template/tmplt_f');
	}

	public function pekerjaan($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterpekerjaan();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/pekerjaan',$data);
		$this->load->view('template/tmplt_f');
	}

	public function freelance($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterfl();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/fl',$data);
		$this->load->view('template/tmplt_f');
	}

	public function pm($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterpm();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/pm',$data);
		$this->load->view('template/tmplt_f');
	}

	public function finance($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterfinance();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/finance',$data);
		$this->load->view('template/tmplt_f');
	}

	public function user($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasteruser();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/user',$data);
		$this->load->view('template/tmplt_f');
	}

	public function profilefl($id=NULL) {
		$data['user'] = $this->db->get_where('freelance', ['id' => $id])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->query("select count(id_pekerjaan) as jumlah from pekerjaan where id_fl ='".$id."'")->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/profile',$data);
		$this->load->view('template/tmplt_f');
	}

	public function profilepm($id=NULL) {
		$data['user'] = $this->db->get_where('pm', ['id' => $id])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->query("select count(id_pekerjaan) as jumlah from pekerjaan where id_pm ='".$id."'")->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/profile',$data);
		$this->load->view('template/tmplt_f');
	}

	public function profilefinance($id=NULL) {
		$data['user'] = $this->db->get_where('finance', ['id' => $id])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->query("select count(id_pekerjaan) as jumlah from pekerjaan where id_fl ='".$this->session->userdata('id_user')."'")->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/profile',$data);
		$this->load->view('template/tmplt_f');
	}

	public function tambahdata()
	{
		$x['nota']=$this->m_pms->get_idkerja();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambah',$x);
		$this->load->view('template/tmplt_f');
	}

	public function tambahdatafinance()
	{
		$x['nota']=$this->m_pms->get_idfinance();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambahfinance',$x);
		$this->load->view('template/tmplt_f');
	}

	public function tambahdatafl()
	{
		$x['nota']=$this->m_pms->get_idfl();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambahfl',$x);
		$this->load->view('template/tmplt_f');
	}

	public function tambahdatapm()
	{
		$x['nota']=$this->m_pms->get_idpm();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambahpm',$x);
		$this->load->view('template/tmplt_f');
	}

	public function ubahdata($id=NULL)
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/edit',$data);
		$this->load->view('template/tmplt_f');
	}

	public function ubahdatafinance($id=NULL)
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('finance', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editfinance',$data);
		$this->load->view('template/tmplt_f');
	}

	public function ubahdatafl($id=NULL)
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('freelance', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editfl',$data);
		$this->load->view('template/tmplt_f');
	}

	public function ubahdatapm($id=NULL)
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('pm', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editpm',$data);
		$this->load->view('template/tmplt_f');
	}

	public function ubahdatauser($id=NULL)
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/edituser',$data);
		$this->load->view('template/tmplt_f');
	}

	public function kirimemail($id=NULL){
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$data['fl'] = $this->db->get_where('freelance', ['id' => $data['p']['id_fl']])->row_array();
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
        $this->email->to($data['fl']['email_fl']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('uploads/'.$data['p']['file_asal']));

        // Subject email
        $this->email->subject('Pekerjaan Baru');

        // Isi email
        $this->email->message("berikut adalah pekerjaan baru untuk anda");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}

	function do_upload() {
        $this->load->helper('url');
        $id = $this->input->post('id_pekerjaan');

        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx|zip|rar';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id_pekerjaan');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				'id_pekerjaan' =>  $id,
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'id_pm' => $this->input->post('id_pm'),
				'detail' => $this->input->post('detail'),
				'wc_xtranslated' => $this->input->post('wc_xtranslated'),
				'w_xtranslated' => $this->input->post('w_xtranslated'),
				'wc_repetition' => $this->input->post('wc_repetition'),
				'w_repetition' => $this->input->post('w_repetition'),
				'wc_fuzzy100' => $this->input->post('wc_fuzzy100'),
				'w_fuzzy100' => $this->input->post('w_fuzzy100'),
				'wc_fuzzy95' => $this->input->post('wc_fuzzy95'),
				'w_fuzzy95' => $this->input->post('w_fuzzy95'),
				'wc_fuzzy85' => $this->input->post('wc_fuzzy85'),
				'w_fuzzy85' => $this->input->post('w_fuzzy85'),
				'wc_fuzzy50' => $this->input->post('wc_fuzzy50'),
				'w_fuzzy50' => $this->input->post('w_fuzzy50'),
				'wc_nomatch' => $this->input->post('wc_nomatch'),
				'w_nomatch' => $this->input->post('w_nomatch'),
				'currency' => 'IDR',
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => 'Sedang Dikerjakan',
                'file_asal' => $result
            );

			$this->db->insert('pekerjaan',$data);
			$this->kirimemail($id);
            redirect('admin/pekerjaan');
		}
	}

	function do_uploadfinance() {
        $this->load->helper('url');
        $id = $this->input->post('id');

        // setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_finance' => $this->input->post('email_finance'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_user' => $id,
				'level' => 'finance'
            );

			$this->db->insert('finance',$data);
			$this->db->insert('user',$data2);
            redirect('admin/finance');
		}
	}

	function do_uploadfl() {
        $this->load->helper('url');
        $id = $this->input->post('id');

        // setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_fl' => $this->input->post('email_fl'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_fl' => $this->input->post('no_telp_fl'),
				'no_hp_fl' => $this->input->post('no_hp_fl'),
				'rate' => $this->input->post('rate'),
				'bank' => $this->input->post('bank'),
				'no_akun' => $this->input->post('no_akun'),
				'bahasa_awal' => $this->input->post('bahasa_awal'),
				'bahasa_akhir' => $this->input->post('bahasa_akhir'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_user' => $id,
				'level' => 'fl'
            );

			$this->db->insert('freelance',$data);
			$this->db->insert('user',$data2);
            redirect('admin/freelance');
		}
	}

	function do_uploadpm() {
        $this->load->helper('url');
        $id = $this->input->post('id');

        // setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_pm' => $this->input->post('email_pm'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_pm' => $this->input->post('no_telp_pm'),
				'fax_pm' => $this->input->post('fax_pm'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_user' => $id,
				'level' => 'pm'
            );

			$this->db->insert('pm',$data);
			$this->db->insert('user',$data2);
            redirect('admin/pm');
		}
	}
	
	function do_upload2() {
        $this->load->helper('url');
		$id = $this->input->post('id_pekerjaan');
		// setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx|zip|rar';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$id = $this->input->post('id_pekerjaan');
            $data = array(
				'id_pekerjaan' =>  $id,
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'id_pm' => $this->input->post('id_pm'),
				'detail' => $this->input->post('detail'),
				'wc_xtranslated' => $this->input->post('wc_xtranslated'),
				'w_xtranslated' => $this->input->post('w_xtranslated'),
				'wc_repetition' => $this->input->post('wc_repetition'),
				'w_repetition' => $this->input->post('w_repetition'),
				'wc_fuzzy100' => $this->input->post('wc_fuzzy100'),
				'w_fuzzy100' => $this->input->post('w_fuzzy100'),
				'wc_fuzzy95' => $this->input->post('wc_fuzzy95'),
				'w_fuzzy95' => $this->input->post('w_fuzzy95'),
				'wc_fuzzy85' => $this->input->post('wc_fuzzy85'),
				'w_fuzzy85' => $this->input->post('w_fuzzy85'),
				'wc_fuzzy50' => $this->input->post('wc_fuzzy50'),
				'w_fuzzy50' => $this->input->post('w_fuzzy50'),
				'wc_nomatch' => $this->input->post('wc_nomatch'),
				'w_nomatch' => $this->input->post('w_nomatch'),
				'bahasa_asal' => $this->input->post('bahasa_asal'),
				'bahasa_target' => $this->input->post('bahasa_akhir'),
				'currency' => $this->input->post('currency'),
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => $this->input->post('status')
            );

            $this->m_pms->updatePekerjaan($id,$data);
            redirect('admin/pekerjaan');
        } else {
			
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id_pekerjaan');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				'id_pekerjaan' =>  $id,
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'id_pm' => $this->input->post('id_pm'),
				'detail' => $this->input->post('detail'),
				'wc_xtranslated' => $this->input->post('wc_xtranslated'),
				'w_xtranslated' => $this->input->post('w_xtranslated'),
				'wc_repetition' => $this->input->post('wc_repetition'),
				'w_repetition' => $this->input->post('w_repetition'),
				'wc_fuzzy100' => $this->input->post('wc_fuzzy100'),
				'w_fuzzy100' => $this->input->post('w_fuzzy100'),
				'wc_fuzzy95' => $this->input->post('wc_fuzzy95'),
				'w_fuzzy95' => $this->input->post('w_fuzzy95'),
				'wc_fuzzy85' => $this->input->post('wc_fuzzy85'),
				'w_fuzzy85' => $this->input->post('w_fuzzy85'),
				'wc_fuzzy50' => $this->input->post('wc_fuzzy50'),
				'w_fuzzy50' => $this->input->post('w_fuzzy50'),
				'wc_nomatch' => $this->input->post('wc_nomatch'),
				'w_nomatch' => $this->input->post('w_nomatch'),
				'bahasa_asal' => $this->input->post('bahasa_asal'),
				'bahasa_target' => $this->input->post('bahasa_akhir'),
				'currency' => $this->input->post('currency'),
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => $this->input->post('status'),
                'file_asal' => $result
            );

            $this->m_pms->updatePekerjaan($id,$data);
            redirect('admin/pekerjaan');
		}
		}
        
	}

	function do_edituser(){
		$id = $this->input->post('id_user');
        $data2 = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level')
		);
		$this->db->update('user', $data2, array('id_user' => $id));
        redirect('admin/user');
	}

	function do_uploadfinance2() {
        $this->load->helper('url');
		$id = $this->input->post('id');
		// setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$id = $this->input->post('id');
            $data = array(
				//'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_finance' => $this->input->post('email_finance'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				//'id_user' => $id,
				'level' => 'finance'
			);
			
			$this->db->update('finance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/finance');
        } else {
			
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

            $data = array(
				//'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_finance' => $this->input->post('email_finance'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				//'id_user' => $id,
				'level' => 'finance'
            );

			$this->db->update('finance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/finance');
		}
		}
        
	}
	
	function do_uploadfl2() {
        $this->load->helper('url');
		$id = $this->input->post('id');
		// setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$id = $this->input->post('id');
			$data = array(
				//'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_fl' => $this->input->post('email_fl'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_fl' => $this->input->post('no_telp_fl'),
				'no_hp_fl' => $this->input->post('no_hp_fl'),
				'rate' => $this->input->post('rate'),
				'bank' => $this->input->post('bank'),
				'no_akun' => $this->input->post('no_akun'),
				'bahasa_awal' => $this->input->post('bahasa_awal'),
				'bahasa_akhir' => $this->input->post('bahasa_akhir')
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				//'id_user' => $id,
				'level' => 'fl'
            );
			
			$this->db->update('freelance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/freelance');
        } else {
			
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

			$data = array(
				'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_fl' => $this->input->post('email_fl'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_fl' => $this->input->post('no_telp_fl'),
				'no_hp_fl' => $this->input->post('no_hp_fl'),
				'rate' => $this->input->post('rate'),
				'bank' => $this->input->post('bank'),
				'no_akun' => $this->input->post('no_akun'),
				'bahasa_awal' => $this->input->post('bahasa_awal'),
				'bahasa_akhir' => $this->input->post('bahasa_akhir'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_user' => $id,
				'level' => 'fl'
            );

			$this->db->update('freelance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/freelance');
		}
		}
        
	}

	function do_uploadpm2() {
        $this->load->helper('url');
		$id = $this->input->post('id');
		// setting konfigurasi upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id;
        // load library upload
        $this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$id = $this->input->post('id');
			$data = array(
				//'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_pm' => $this->input->post('email_pm'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_pm' => $this->input->post('no_telp_pm'),
				'fax_pm' => $this->input->post('fax_pm'),
                
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				//'id_user' => $id,
				'level' => 'pm'
            );
			
			$this->db->update('pm', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/pm');
        } else {
			
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data('file_name');
			$id = $this->input->post('id');
			// $dateasal = 

            echo "<pre>";
            print_r($result);
            echo "</pre>";

			$data = array(
				//'id' =>  $id,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email_pm' => $this->input->post('email_pm'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp_pm' => $this->input->post('no_telp_pm'),
				'fax_pm' => $this->input->post('fax_pm'),
                'foto' => $result
			);
			
			$data2 = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				//'id_user' => $id,
				'level' => 'pm'
            );

			$this->db->update('pm', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
            redirect('admin/pm');
		}
		}
        
	}

	function hapus($id){
		$this->load->helper('text');
		$p = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$po = $this->db->get_where('po', ['id_pekerjaan' => $id])->row_array();
		$inv = $this->db->get_where('invoice', ['id_po' => $po['id_po']])->row_array();
		unlink(APPPATH.'../uploads/'.$inv['id_invoice'.'.pdf']);
		unlink(APPPATH.'../uploads/PO-'.$id.'.pdf');
		unlink(APPPATH.'../uploads/'.$p['file_asal']);
		unlink(APPPATH.'../uploads/'.$p['file_selesai']);
		$this->db->delete('invoice', array('id_po' => $po['id_po']));
		$this->db->delete('po', array('id_pekerjaan' => $id));
		$this->db->delete('pekerjaan', array('id_pekerjaan' => $id));
		redirect('admin/pekerjaan');
	}

	function hapusfinance($id){
		$this->load->helper('text');
		$po = $this->db->get_where('finance', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('finance', array('id' => $id));
		redirect('admin/finance');
	}

	function hapusfl($id){
		$this->load->helper('text');
		$po = $this->db->get_where('freelance', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('freelance', array('id' => $id));
		redirect('admin/freelance');
	}

	function hapuspm($id){
		$this->load->helper('text');
		$po = $this->db->get_where('pm', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('pm', array('id' => $id));
		redirect('admin/pm');
	}

	function hapususer($id){
		$this->load->helper('text');
		$po = $this->db->get_where('user', ['id_user' => $id])->row_array();
		if($po['level']=='fl'){
			$this->db->delete('freelance', array('id' => $id));
		} else if($po['level']=='pm'){
			$this->db->delete('pm', array('id' => $id));
		} else if($po['level']=='finance'){
			$this->db->delete('finance', array('id' => $id));
		}
		$this->db->delete('user', array('id_user' => $id));
		redirect('admin/user');
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user['id_pm']])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$po = $this->db->get_where('po',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$data['i'] = $this->db->get_where('invoice',['id_po' =>  $po['id_po']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/detail',$data);
		$this->load->view('template/tmplt_f');
	}
}