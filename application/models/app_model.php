<?php 

class app_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function proseslogin($uname, $pass){
        $this->db->where('username',$uname);
        $this->db->where('username',$pass);
        return $this->db->get('user')->row();
    }
}

?>