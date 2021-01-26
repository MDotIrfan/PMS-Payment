<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_pms');
		$this->load->helper('url_helper');	
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function home($page = 'home')
	{
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datamasterpekerjaan();
		$data['finance'] = $this->db->get('finance')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['pm'] = $this->db->get('pm')->result_array();
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

	public function laporan($id=null) {
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['tahun']=$this->db->query("SELECT distinct year(tgl_dibuat) as tahun FROM pekerjaan")->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/laporan',$data);
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
		$data['fl'] =  $this->db->query("SELECT id, id_fl, nama, COUNT(*) AS jumlah FROM pekerjaan JOIN freelance WHERE pekerjaan.`id_fl` = freelance.`id` GROUP BY id_fl ORDER BY jumlah")->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$data['p'] = $this->db->query("SELECT id_fl, nama, COUNT(*) AS jumlah FROM pekerjaan JOIN freelance WHERE pekerjaan.`id_fl` = freelance.`id` GROUP BY id_fl ORDER BY jumlah")->row_array();
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
		$this->form_validation->set_rules('nama_pekerjaan', 'project_name', 'required', array('required' => 'Nama Pekerjaan tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$x['nota']=$this->m_pms->get_idkerja();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambah',$x);
		$this->load->view('template/tmplt_f');
		} else {
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
				'currency' => 'IDR',
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
				'tgl_dibuat' => $this->input->post('tgl_dibuat'),
                'status' => 'Sedang Dikerjakan',
                'file_asal' => $result
            );

			$this->db->insert('pekerjaan',$data);
			$this->kirimemail($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data pekerjaan berhasil ditambahkan!
		  </div>');
            redirect('admin/pekerjaan');
		}
	}
	}

	function do_uploadfinance() {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_finance', 'Email', 'required|valid_email|is_unique[finance.email_finance]', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid', 'is_unique' => 'email sudah digunakan'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_hp', 'phone_number', 'required|is_natural', array('required' => 'No. Handphone tidak boleh kosong' , 'is_natural'=> 'Format No. Handphone tidak valid'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username tidak boleh kosong', 'is_unique' => 'username sudah digunakan'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$x['nota']=$this->m_pms->get_idfinance();
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['pm'] = $this->db->get('pm')->result_array();
			$data['fl'] = $this->db->get('freelance')->result_array();
			$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
			$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
			$this->load->view('template/tmplt_h',$data);
			$this->load->view('admin/tambahfinance',$x);
			$this->load->view('template/tmplt_f');
		} else {
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
				'email' => $this->input->post('email_finance'),
				'id_user' => $id,
				'level' => 'finance'
            );

			$this->db->insert('finance',$data);
			$this->db->insert('user',$data2);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data finance berhasil ditambahkan!
		  </div>');
            redirect('admin/finance');
		}	
		}
	}

	function do_uploadfl() {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_fl', 'Email', 'required|valid_email|is_unique[freelance.email_fl]', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid', 'is_unique' => 'email sudah digunakan'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_telp_fl', 'tel_number', 'is_natural', array('is_natural'=> 'Format No.telfon tidak valid'));
		$this->form_validation->set_rules('no_hp_fl', 'phone_number', 'required|is_natural', array('required' => 'No. Handphone tidak boleh kosong' , 'is_natural'=> 'Format No. Handphone tidak valid'));
		$this->form_validation->set_rules('bank', 'Bank', 'required', array('required' => 'Nama Bank tidak boleh kosong'));
		$this->form_validation->set_rules('no_akun', 'number_account', 'required|is_natural', array('required' => 'No. Rekening tidak boleh kosong' , 'is_natural'=> 'Format No. Rekening tidak valid'));
		$this->form_validation->set_rules('bahasa_awal', 'F_language', 'required', array('required' => 'Bahasa Awal tidak boleh kosong'));
		$this->form_validation->set_rules('bahasa_akhir', 'T_language', 'required', array('required' => 'Bahasa Akhir tidak boleh kosong'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username tidak boleh kosong', 'is_unique' => 'username sudah digunakan'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$x['nota']=$this->m_pms->get_idfl();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambahfl',$x);
		$this->load->view('template/tmplt_f');
		} else {
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
				'email' => $this->input->post('email_fl'),
				'id_user' => $id,
				'level' => 'fl'
            );

			$this->db->insert('freelance',$data);
			$this->db->insert('user',$data2);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data freelance berhasil ditambahkan!
		  </div>');
            redirect('admin/freelance');
		}
	}
	}

	function do_uploadpm() {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_pm', 'Email', 'required|valid_email|is_unique[pm.email_pm]', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid', 'is_unique' => 'email sudah digunakan'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_telp_pm', 'phone_number', 'required|is_natural', array('required' => 'No. Telfon tidak boleh kosong' , 'is_natural'=> 'Format No. Telfon tidak valid'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username tidak boleh kosong', 'is_unique' => 'username sudah digunakan'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$x['nota']=$this->m_pms->get_idpm();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/tambahpm',$x);
		$this->load->view('template/tmplt_f');
		} else {
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
				'email' => $this->input->post('email_pm'),
				'id_user' => $id,
				'level' => 'pm'
            );

			$this->db->insert('pm',$data);
			$this->db->insert('user',$data2);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data project manager berhasil ditambahkan!
		  </div>');
            redirect('admin/pm');
		}
	}
	}
	
	function do_upload2($id=NULL) {
		$this->form_validation->set_rules('nama_pekerjaan', 'project_name', 'required', array('required' => 'Nama Pekerjaan tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get('pm')->result_array();
		$data['fl'] = $this->db->get('freelance')->result_array();
		$data['bawal'] = $this->db->select('*')->group_by('bahasa_awal')->get('freelance')->result_array();
		$data['bakhir'] = $this->db->select('*')->group_by('bahasa_akhir')->get('freelance')->result_array();
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/edit',$data);
		$this->load->view('template/tmplt_f');
		} else {
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
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => $this->input->post('status')
            );

			$this->m_pms->updatePekerjaan($id,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data pekerjaan berhasil diubah!
		  </div>');
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
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => $this->input->post('status'),
                'file_asal' => $result
            );

			$this->m_pms->updatePekerjaan($id,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data pekerjaan berhasil diubah!
		  </div>');
            redirect('admin/pekerjaan');
		}
		}
	}
	}

	function do_edituser($id=NULL){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/edituser',$data);
		$this->load->view('template/tmplt_f');
		} else {
		$id = $this->input->post('id_user');
		$level = $this->input->post('level');
        $data2 = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level')
		);
		if($level == 'fl'){
			$data = array(
				'email_fl' => $this->input->post('email'),
			);
			$this->db->update('freelance', $data, array('id' => $id));
		} elseif($level == 'pm'){
			$data = array(
				'email_pm' => $this->input->post('email'),
			);
			$this->db->update('pm', $data, array('id' => $id));
		} elseif($level == 'finance'){
			$data = array(
				'email_finance' => $this->input->post('email'),
			);
			$this->db->update('finance', $data, array('id' => $id));
		}
		$this->db->update('user', $data2, array('id_user' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data user berhasil diubah!
		  </div>');
		redirect('admin/user');
	}
	}

	function do_uploadfinance2($id=NULL) {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_finance', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_hp', 'phone_number', 'required|is_natural', array('required' => 'No. Handphone tidak boleh kosong' , 'is_natural'=> 'Format No. Handphone tidak valid'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('finance', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editfinance',$data);
		$this->load->view('template/tmplt_f');
		} else {
		
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
				'email' => $this->input->post('email_finance'),
				//'id_user' => $id,
				'level' => 'finance'
			);
			
			$this->db->update('finance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data finance berhasil diubah!
		  </div>');
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
				'email' => $this->input->post('email_finance'),
				//'id_user' => $id,
				'level' => 'finance'
            );

			$this->db->update('finance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data finance berhasil diubah!
		  </div>');
            redirect('admin/finance');
		}
		}
	}
        
	}
	
	function do_uploadfl2($id=NULL) {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_fl', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_telp_fl', 'tel_number', 'is_natural', array('is_natural'=> 'Format No.telfon tidak valid'));
		$this->form_validation->set_rules('no_hp_fl', 'phone_number', 'required|is_natural', array('required' => 'No. Handphone tidak boleh kosong' , 'is_natural'=> 'Format No. Handphone tidak valid'));
		$this->form_validation->set_rules('bank', 'Bank', 'required', array('required' => 'Nama Bank tidak boleh kosong'));
		$this->form_validation->set_rules('no_akun', 'number_account', 'required|is_natural', array('required' => 'No. Rekening tidak boleh kosong' , 'is_natural'=> 'Format No. Rekening tidak valid'));
		$this->form_validation->set_rules('bahasa_awal', 'F_language', 'required', array('required' => 'Bahasa Awal tidak boleh kosong'));
		$this->form_validation->set_rules('bahasa_akhir', 'T_language', 'required', array('required' => 'Bahasa Akhir tidak boleh kosong'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('freelance', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editfl',$data);
		$this->load->view('template/tmplt_f');
		} else {
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
				'email' => $this->input->post('email_fl'),
				//'id_user' => $id,
				'level' => 'fl'
            );
			
			$this->db->update('freelance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data freelance berhasil diubah!
		  </div>');
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
				'email' => $this->input->post('email_fl'),
				'id_user' => $id,
				'level' => 'fl'
            );

			$this->db->update('freelance', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data freelance berhasil diubah!
		  </div>');
            redirect('admin/freelance');
		}
		}
	}
	}

	function do_uploadpm2($id=NULL) {
		$this->form_validation->set_rules('nama', 'name', 'required', array('required' => 'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('email_pm', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid'));
		$this->form_validation->set_rules('alamat', 'Address', 'required', array('required' => 'Alamat tidak boleh kosong'));
		$this->form_validation->set_rules('no_telp_pm', 'phone_number', 'required|is_natural', array('required' => 'No. Telfon tidak boleh kosong' , 'is_natural'=> 'Format No. Telfon tidak valid'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('pm', ['id' => $id])->row_array();
		$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('admin/editpm',$data);
		$this->load->view('template/tmplt_f');
		} else {
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
				'email' => $this->input->post('email_pm'),
				//'id_user' => $id,
				'level' => 'pm'
            );
			
			$this->db->update('pm', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data project manager berhasil diubah!
		  </div>');
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
				'email' => $this->input->post('email_pm'),
				//'id_user' => $id,
				'level' => 'pm'
            );

			$this->db->update('pm', $data, array('id' => $id));
			$this->db->update('user', $data2, array('id_user' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data project manager berhasil diubah!
		  </div>');
            redirect('admin/pm');
		}
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
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data pekerjaan berhasil dihapus!
		  </div>');
		redirect('admin/pekerjaan');
	}

	function hapusfinance($id){
		$this->load->helper('text');
		$po = $this->db->get_where('finance', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('finance', array('id' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data finance berhasil dihapus!
		  </div>');
		redirect('admin/finance');
	}

	function hapusfl($id){
		$this->load->helper('text');
		$po = $this->db->get_where('freelance', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('freelance', array('id' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data freelance berhasil dihapus!
		  </div>');
		redirect('admin/freelance');
	}

	function hapuspm($id){
		$this->load->helper('text');
		$po = $this->db->get_where('pm', ['id' => $id])->row_array();
		unlink(APPPATH.'../images/'.$po['foto']);
		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('pm', array('id' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data project manager berhasil dihapus!
		  </div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data user berhasil dihapus!
		  </div>');
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

	function generatelaporan($id=NULL){
		$data['bln'] = $this->uri->segment(3);
		$data['thun'] = $this->uri->segment(4);
		// if(empty($data['bln'])&&empty($data['thun'])){
		// 	$data['pekerjaan']=$this->db->query("SELECT * FROM pekerjaan")->result_array();
		// } else {
		// 	$data['pekerjaan']=$this->db->query("SELECT * FROM pekerjaan WHERE MONTH(tgl_dibuat) = '$bln' and year(tgl_dibuat) = '$thun'")->result_array();
		// }
		$this->load->view('admin/laporan_cetak',$data);
	}
}