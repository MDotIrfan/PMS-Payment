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

	function do_upload() {
        $this->load->helper('url');
        $id = $this->input->post('id_pekerjaan');

        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx';
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
				'bahasa_asal' => $this->input->post('bahasa_asal'),
				'bahasa_target' => $this->input->post('bahasa_akhir'),
				'currency' => $this->input->post('currency'),
				'id_fl' => $this->input->post('id_fl'),
				'deadline' => $this->input->post('deadline'),
                'status' => 'Sedang Dikerjakan',
                'file_asal' => $id
            );

            $this->db->insert('pekerjaan',$data);
            redirect('admin/');
		}
	}
	function do_upload2() {
        $this->load->helper('url');
		$id = $this->input->post('id_pekerjaan');
		// setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx';
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
            redirect('admin/');
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
                'file_asal' => $id
            );

            $this->m_pms->updatePekerjaan($id,$data);
            redirect('admin/');
		}
		}
        
	}
	
	function hapus($id){
		$this->db->delete('pekerjaan', array('id_pekerjaan' => $id));
		redirect('admin/');
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