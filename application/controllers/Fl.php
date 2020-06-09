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
		$data['psd'] = $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' =>'Sedang Dikerjakan'])->result_array();
		$data['pmp'] = $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' =>'Menunggu PO'])->result_array();
		$data['psi'] = $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' =>'Siap Invoice'])->result_array();
		$data['psudi'] = $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' =>'Sudah Invoice'])->result_array();
		$data['psp'] = $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' =>'Selesai Pembayaran'])->result_array();
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
        $this->email->subject('Pekerjaan Selesai');

        // Isi email
        $this->email->message("Pekerjaan ".$data['p']['nama_pekerjaan']." telah selesai dikerjakan oleh ".$data['fl']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}

	public function kirimemail2($id=NULL){
		$data['inv'] = $this->db->get_where('invoice', ['id_invoice' => $id])->row_array();
		$data['fl'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
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
        $this->email->to('finstarna2@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('uploads/'.$data['inv']['id_invoice'].'.pdf'));

        // Subject email
        $this->email->subject('Invoice Baru');

        // Isi email
        $this->email->message("Invoice baru telah dibuat oleh ".$data['fl']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		//$user = $this->db->get_where('pekerjaan',['id_fl' => $this->session->userdata('id_user')])->row_array();
		$user2 = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user2['id_pm']])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' =>  $user2['id_pekerjaan']])->row_array();
		$po = $this->db->get_where('po',['id_pekerjaan' =>  $user2['id_pekerjaan']])->row_array();
		$data['i'] = $this->db->get_where('invoice',['id_po' =>  $po['id_po']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('fl/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function submitpekerjaan($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_fl' => $this->session->userdata('id_user')])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user['id_pm']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
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
		$this->generateinv($id_invoice);
		$this->kirimemail2($id_invoice);
		redirect('fl/sudahinvoice/');
	}

	function generateinv($id=NULL){
		$data['i']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and f.id = '". $this->session->userdata('id_user')."' and i.id_invoice='".$id."'")->result_array();
		$data['fl']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl and f.id = '". $this->session->userdata('id_user')."'GROUP BY f.id")->result_array();
		foreach ($data['i'] as $p){
			$data['pm']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND pm.id = po.id_pm GROUP BY pm.id")->result_array();
		}
		$data['inv']=$this->db->get_where('invoice', ['id_invoice'=>$id])->row_array();
		$this->load->library('pdfgenerator');
		$html=$this->load->view('fl/views/invoice',$data,true);
		$this->pdfgenerator->generate($html,$id);
		foreach ($data['i'] as $p){
			$data = array(
				'status' => 'Sudah Invoice',
			);
			$this->m_pms->updatePekerjaan($p['id_pekerjaan'], $data);
		}
	}
}