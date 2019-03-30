<?php 
 
class data_user extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_kategori(){
		$query = $this->db->get('kategori_user');
		$query_result = $query->result();
		return $query_result;
	}
}