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

    public function get_datapmsudahinvoice($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' => 'Sudah Invoice'])->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datapmselesaipembayaran($id = FALSE){
        if($id === FALSE){
            return $this->db->get_where('pekerjaan', ['id_pm' => $this->session->userdata('id_user'), 'status' => 'Selesai Pembayaran'])->result_array();
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

    public function get_datamasterpekerjaan($id = FALSE){
        if($id === FALSE){
            return $this->db->get('pekerjaan')->result_array();
        }
        return $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id))->row_array();
    }

    public function get_datamasterfl($id = FALSE){
        if($id === FALSE){
            return $this->db->get('freelance')->result_array();
        }
        return $this->db->get_where('freelance', array('id' => $id))->row_array();
    }

    public function get_datamasterpm($id = FALSE){
        if($id === FALSE){
            return $this->db->get('pm')->result_array();
        }
        return $this->db->get_where('pm', array('id' => $id))->row_array();
    }

    public function get_datamasterfinance($id = FALSE){
        if($id === FALSE){
            return $this->db->get('finance')->result_array();
        }
        return $this->db->get_where('finance', array('id' => $id))->row_array();
    }

    public function get_datamasteruser($id = FALSE){
        if($id === FALSE){
            return $this->db->get('user')->result_array();
        }
        return $this->db->get_where('user', array('id' => $id))->row_array();
    }

    public function getDataByID($id){
        return $this->db->get_where('pekerjaan', array('id_pekerjaan'=>$id));
    }

    public function updateFile($id, $data){
        $this->db->where('id_pekerjaan', $id);
        return $this->db->update('pekerjaan', $data);
    }
    public function updatePekerjaan($id, $data){
        $this->db->where('id_pekerjaan', $id);
        return $this->db->update('pekerjaan', $data);
    }
    public function updateFinance($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('finance', $data);
    }
    public function updateUser($id, $data){
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }
    public function get_idkerja(){
        $cd = $this->db->query("SELECT MAX(RIGHT(id_pekerjaan,3)) AS kd_max FROM pekerjaan");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "TS".$kd;
    }
    public function get_idfinance(){
        $cd = $this->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM finance");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "FN".$kd;
    }
    public function get_idfl(){
        $cd = $this->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM freelance");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "FL".$kd;
    }
    public function get_idpm(){
        $cd = $this->db->query("SELECT MAX(RIGHT(id,3)) AS kd_max FROM pm");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "PM".$kd;
    }
}

?>