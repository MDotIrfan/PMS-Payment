<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_pms');
		$this->load->helper('url_helper');	
	}

	public function home($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafl();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/'.$page,$data);
		$this->load->view('template/tmplt_f');
	}

	public function sedangdikerjakan($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_dataflsedangdikerjakan();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/sedangdikerjakan',$data);
		$this->load->view('template/tmplt_f');
	}

	public function menunggupo($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_dataflmenunggupo();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/menunggupo',$data);
		$this->load->view('template/tmplt_f');
	}

	public function siapinvoice($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_fl' => $this->session->userdata('id_user')])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->get_where('pekerjaan',['id_fl' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user['id_pm']])->row_array();
		$data['po'] = $this->m_pms->get_dataflsiapinvoice();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/siapinvoice',$data);
		$this->load->view('template/tmplt_f');
	}

	public function sudahinvoice($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_dataflsudahinvoice();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/sudahinvoice',$data);
		$this->load->view('template/tmplt_f');
	}

	public function selesaipembayaran($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_dataflselesaipembayaran();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/selesaipembayaran',$data);
		$this->load->view('template/tmplt_f');
	}

	public function buatinvoice($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafl($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/buatinvoice',$data);
		$this->load->view('template/tmplt_f');
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafl($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function submitpekerjaan($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datafl($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/submitpekerjaan',$data);
		$this->load->view('template/tmplt_f');
	}

	public function create($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/tambahdata');
		$this->load->view('template/tmplt_f');
	}
	
	function inputinvoice(){
		$id_invoice = $this->input->post('id_invoice');
		$tgl = $this->input->post('tgl');
		$id_p = $this->input->post('id_po');
		foreach($id_p as $id_p){
			$data = array(
				'id_invoice' => $id_invoice,
				'tgl' => $tgl,
				'id_po' => $id_p,
				);
				$this->db->insert('invoice',$data);
		}
		redirect('fl/generatepo/'.$id_invoice);
	}

	function generatepo($id=NULL){
		$user = $this->db->get_where('invoice',['id_invoice' => $id])->row_array();
		$data['invoice'] = $this->db->get_where('invoice',['id_invoice' => $id])->row_array();
		$data['po'] = $this->db->get_where('po',['id_po' => $user['id_po']])->row_array();
		$po = $this->db->get_where('po',['id_po' => $user['id_po']])->row_array();
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' =>  $po['id_pekerjaan']])->result_array();
		$data['pm'] = $this->db->get_where('pm', ['id' =>  $po['id_pm']])->result_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $po['id_fl']])->row_array();
		$this->load->view('fl/views/invoice',$data);
	}
}