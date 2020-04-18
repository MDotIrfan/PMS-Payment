<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pms');
		$this->load->helper('url_helper');	
	}

	public function index($page = 'home')
	{

		if(!file_exists(APPPATH."views/finance/".$page.'.php')){
			show_404();
		}
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafinance();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/'.$page,$data);
		$this->load->view('template/tmplt_f');
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafinance($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function create($id = NULL)
	{	
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/tambahdata');
		$this->load->view('template/tmplt_f');
	}
}