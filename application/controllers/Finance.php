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
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/'.$page,$data);
		$this->load->view('template/tmplt_f');
	}

	public function view($id = NULL)
	{	
		$data['user'] = $this->db->get_where('pm', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['i']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and i.id_invoice='".$id."' GROUP BY i.id_invoice")->result_array();
		foreach ($data['i'] as $p){
			$data['pm']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND pm.id = po.id_pm and pm.id = '". $p['id_pm']."' GROUP BY pm.id")->result_array();
			$data['fl']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl and f.id = '". $p['id_fl']."' GROUP BY f.id")->result_array();
		}
		$data['inv']=$this->db->get_where('invoice', ['id_invoice'=>$id])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/detail',$data);
		$this->load->view('template/tmplt_f');
	}

	public function detail($id = NULL)
	{	
		$data['user'] = $this->db->get_where('freelance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$user = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
		$data['po'] = $this->db->get_where('po',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$data['pm'] = $this->db->get_where('pm',['id' =>  $user['id_pm']])->row_array();
		$data['fl'] = $this->db->get_where('freelance',['id' =>  $user['id_fl']])->row_array();
		$po = $this->db->get_where('po',['id_pekerjaan' =>  $user['id_pekerjaan']])->row_array();
		$data['i'] = $this->db->get_where('invoice',['id_po' =>  $po['id_po']])->row_array();
		$data['pekerjaan'] = $this->m_pms->get_data($id);
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/detailpekerjaan',$data);
		$this->load->view('template/tmplt_f');
	}

	public function sudahinvoice($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['invoice'] = $data['i']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and p.status = 'Sudah Invoice' GROUP BY i.id_invoice")->result_array(); 
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/sudahinvoice',$data);
		$this->load->view('template/tmplt_f');
	}

	public function selesaipembayaran($page = 'home')
	{

		if(!file_exists(APPPATH."views/fl/".$page.'.php')){
			show_404();
        }
        
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$data['level'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['pekerjaan'] = $this->db->get_where('pekerjaan', ['status' => 'Selesai Pembayaran'])->result_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/selesaipembayaran',$data);
		$this->load->view('template/tmplt_f');
	}

	public function konfirmasi($id=NULL){
		$data['i']=$this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and i.id_invoice='".$id."'")->result_array();
		foreach ($data['i'] as $p){
			$data = array(
				'status' => 'Selesai Pembayaran',
			);
			$this->m_pms->updatePekerjaan($p['id_pekerjaan'], $data);
			$this->kirimemail($p['id_pekerjaan']);
		}
		redirect('finance/selesaipembayaran');
	}

	public function create($id = NULL)
	{	
		$data['user'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('template/tmplt_h',$data);
		$this->load->view('finance/views/tambahdata');
		$this->load->view('template/tmplt_f');
	}

	public function kirimemail($id=NULL){
		$data['p'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
		$data['fl'] = $this->db->get_where('freelance', ['id' => $data['p']['id_fl']])->row_array();
		$data['fin'] = $this->db->get_where('finance', ['id' => $this->session->userdata('id_user')])->row_array();
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
        //$this->email->attach(base_url('uploads/'.$data['inv']['id_invoice'].'.pdf'));

        // Subject email
        $this->email->subject('Invoice Telah Dibayarkan');

        // Isi email
        $this->email->message("Pekerjaan ".$data['p']['nama_pekerjaan']." telah dibayarkan oleh ".$data['fin']['nama']);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}
}