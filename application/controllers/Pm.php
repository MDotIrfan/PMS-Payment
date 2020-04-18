<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pms');
		$this->load->helper('url_helper');	
	}

	public function index($page = 'home')
	{

		if(!file_exists(APPPATH."views/pm/".$page.'.php')){
			show_404();
		}
		
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/'.$page,$data);
		$this->load->view('template/tmplt_f');
	}

	public function sedangdikerjakan($page = 'home')
	{

		if(!file_exists(APPPATH."views/pm/".$page.'.php')){
			show_404();
		}
		
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datapmsedangdikerjakan();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/sedangdikerjakan',$data);
		$this->load->view('template/tmplt_f');
	}

	public function menunggupo($page = 'home')
	{

		if(!file_exists(APPPATH."views/pm/".$page.'.php')){
			show_404();
		}
		
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pm' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datapmmenunggupo();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/menunggupo',$data);
		$this->load->view('template/tmplt_f');
	}

	public function siapinvoice($page = 'home')
	{

		if(!file_exists(APPPATH."views/pm/".$page.'.php')){
			show_404();
		}
		
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_datapmsiapinvoice();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/siapinvoice',$data);
		$this->load->view('template/tmplt_f');
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pm' => $this->session->userdata('id_user')])->row_array();
		$data['fl'] = $this->db->get_where('fl',['id_fl' =>  $user['id_fl']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function buatpo($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pm' => $this->session->userdata('id_user')])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/buatpo',$data);
		$this->load->view('template/tmplt_f');
	}

	public function create($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('template/tmplt_h');
		$this->load->view('pm/views/tambahdata');
		$this->load->view('template/tmplt_f');
	}

	function inputpo(){
		$id_po = $this->input->post('id_po');
		$tgl = $this->input->post('tgl');
		$id_pekerjaan = $this->input->post('id_pekerjaan');
		$total_bayar = $this->input->post('total_bayar');
		$id_fl = $this->input->post('id_fl');
		$id_pm = $this->input->post('id_pm');

		$data = array(
			'id_po' => $id_po,
			'tgl' => $tgl,
			'id_pekerjaan' => $id_pekerjaan,
			'total_bayar' => $total_bayar,
			'id_fl' => $id_fl,
			'id_pm' => $id_pm
			);
			$this->db->insert('po',$data);
		redirect('pm/generatepo/'.$id_pekerjaan);
	}

	function generatepo($id=NULL){
		$user = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$po = $this->db->get_where('po',['id_pekerjaan' => $id])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' => $id])->row_array();
		$data['p'] = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$data['pm'] = $this->db->get_where('pm', ['id' =>  $user['id_pm']])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $po['id_po'].".pdf";
		$this->pdf->load_view('pm/views/po', $data);
		redirect('pm/');
	}
}