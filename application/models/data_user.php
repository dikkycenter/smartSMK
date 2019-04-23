<?php 
 
class data_user extends CI_Model{
	function tampil_data(){
		return $this->db->get('user')->result();
	}

	function data_detail($id) {
        return $this->db->get_where('user', array('id_user' => $id))->result_array();
    }
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_kategori(){
		$query = $this->db->get('kategori_user');
		$query_result = $query->result();
		return $query_result;
	}

	function takedown_data($id, $data) {
        $query = $this->db->where('username', $id);
        $query = $this->db->update('user', $data);
	}

	function takeup_data($id, $data) {
        $query = $this->db->where('nip_pengajar', $id);
        $query = $this->db->update('data_pengajar', $data);
	}
	
	function update_data($id, $data) {
        $query = $this->db->where('id_user', $id);
        $query = $this->db->update('user', $data);
    }
}