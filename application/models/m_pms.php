<?php 

class m_pms extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_data($id = FALSE){ 
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user')])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datapmsedangdikerjakan($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' => 'Sedang Dikerjakan'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datapmmenunggupo($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' => 'Menunggu PO'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datapmsiapinvoice($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' => 'Siap Invoice'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }


    public function get_datafl($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user')])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_dataflsedangdikerjakan($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' => 'Sedang Dikerjakan'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_dataflmenunggupo($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' => 'Menunggu PO'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_dataflsiapinvoice($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('po', ['id_fl' => $this->session->userdata('id_user')])->result_array();
        }
        return $this->db->get_where('po', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_dataflsudahinvoice($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' => 'Sudah Invoice'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_dataflselesaipembayaran($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_fl' => $this->session->userdata('id_user'), 'status' => 'Selesai Pembayaran'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datafinance($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['status' => 'Selesai'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function getDataByID($id){
        return $this->db->get_where('pekerjaan', array('id_pekerjaan'=>$id));
    }

    public function updateFile($id, $data){
        $this->db->where('id_pekerjaan', $id);
        return $this->db->update('pekerjaan', $data);
    }
}

?>