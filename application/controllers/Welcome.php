<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
				redirect('welcome/login');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('level');
		redirect('welcome/login');
	}

	public function po(){
		$this->load->view('po');
	}

	public function invoice(){
		$this->load->view('invoice');
	}
}
