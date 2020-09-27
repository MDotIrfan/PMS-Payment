<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function ceklogin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username / Email tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			if(isset($_POST['login'])){
				$uname = $this->input->post('username', true);
				$pass = $this->input->post('password', true);
				$cek = $this->app_model->proseslogin($uname,$pass);
				$hasil = count($cek);
				if($hasil>0){
					$user = $this->db->get_where('user',['username' => $uname, 'password' => $pass])->row_array();
					$data = [
						'id_user' => $user['id_user'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if($user['level']== 'admin'){
						redirect('admin/');
					} elseif($user['level'] == 'fl'){
						redirect('fl/');
					} elseif($user['level'] == 'pm'){
						redirect('pm/');
					} elseif($user['level'] == 'finance'){
						redirect('finance/');
					}
				} else {
					$cek = $this->app_model->proseslogin2($uname,$pass);
					$hasil = count($cek);
					if($hasil>0){
						$user = $this->db->get_where('user',['email' => $uname, 'password' => $pass])->row_array();
						$data = [
							'id_user' => $user['id_user'],
							'level' => $user['level']
						];
						$this->session->set_userdata($data);
						if($user['level']== 'admin'){
							redirect('admin/');
						} elseif($user['level'] == 'fl'){
							redirect('fl/');
						} elseif($user['level'] == 'pm'){
							redirect('pm/');
						} elseif($user['level'] == 'finance'){
							redirect('finance/');
						}
					} else {
						redirect(base_url('/'));
					}
				}
			} else {
				redirect(base_url('/'));
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('level');
		redirect(base_url('/'));
	}

	public function po(){
		$this->load->view('po');
	}

	public function invoice(){
		$this->load->view('invoice');
	}
}
