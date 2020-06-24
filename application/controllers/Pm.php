<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pms');
		$this->load->helper('url_helper');
		$this->load->helper('url');	
	}

	public function index($page = 'home')
	{

		if(!file_exists(APPPATH."views/pm/".$page.'.php')){
			show_404();
		}
		
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['psd'] = $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' =>'Sedang Dikerjakan'])->result_array();
		$data['pmp'] = $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' =>'Menunggu PO'])->result_array();
		$data['psi'] = $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' =>'Siap Invoice'])->result_array();
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
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$user2 = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' =>  $user2['id_pekerjaan']])->row_array();
		$po = $this->db->get_where('po',['id_pekerjaan' =>  $user2['id_pekerjaan']])->row_array();
		$data['i'] = $this->db->get_where('invoice',['id_po' =>  $po['id_po']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function buatpo($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pekerjaan' =>$id])->row_array();
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
		$this->generatepo($id_pekerjaan);
		redirect('pm/siapinvoice');
	}

	function generatepo($id=NULL){
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pekerjaan' =>$id])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user['id_pm']])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$data['p'] = $this->db->get_where('pekerjaan',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$this->load->library('pdfgenerator');
		$html=$this->load->view('pm/views/po',$data, true);
		$this->pdfgenerator->generate($html,'PO-'.$user['id_pekerjaan']);
		$data = array(
			'id_pekerjaan' =>  $id,
			'status' => 'Siap Invoice',
		);
		$this->m_pms->updatePekerjaan($id, $data);
		$this->kirimemail($id);
		$this->kirimemail2($id);
		// $this->load->view('pm/views/po',$data);
	}

	public function profile() {
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['p'] = $this->db->query("select count(id_pekerjaan) as jumlah from pekerjaan where id_pm ='".$this->session->userdata('id_user')."'")->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('pm/views/profile',$data);
		$this->load->view('template/tmplt_f');
	}

	public function kirimemail($id=NULL){
		$data['po'] = $this->db->get_where('po', ['id_pekerjaan' => $id])->row_array();
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
		$this->email->to($data['fl']['email_fl']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('uploads/'.$data['po']['id_po'].'.pdf'));

        // Subject email
        $this->email->subject('Purchase Order Selesai Dibuat');

        // Isi email
        $this->email->message("Purchase Order baru telah dibuat oleh ".$data['pm']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}

	public function kirimemail2($id=NULL){
		$data['po'] = $this->db->get_where('po', ['id_pekerjaan' => $id])->row_array();
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
		$this->email->to('finstarna2@gmail.com');

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('uploads/'.$data['po']['id_po'].'.pdf'));

        // Subject email
        $this->email->subject('Purchase Order Selesai Dibuat');

        // Isi email
        $this->email->message("Purchase Order baru telah dibuat oleh ".$data['pm']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}

}