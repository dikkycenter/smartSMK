<?php 

class data_pengajar extends CI_Model
{
    function tampil_data() {
        $query = $this->db->get('data_pengajar');
        return $query->result();
    }

    function tampil_data_detail() {
        $this->db->where('nip', $nip);
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
	}

}

?>