<?php 

class app_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function proseslogin($uname, $pass){
        $this->db->where('username',$uname);
        $this->db->where('password',$pass);
        return $this->db->get('user')->row();
    }

    public function proseslogin2($uname, $pass){
        $this->db->where('email',$uname);
        $this->db->where('password',$pass);
        return $this->db->get('user')->row();
    }
}

?>