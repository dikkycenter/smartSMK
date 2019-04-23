<?php 

class data_pengajar extends CI_Model
{
    function tampil_data() {
        $query = $this->db->where('status_pengajar','1');
        $query = $this->db->get('data_pengajar');
        return $query->result();
    }

    function data_detail($id) {
        return $this->db->get_where('data_pengajar', array('nip_pengajar' => $id))->result_array();
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
    }

    function delete_data($id, $data) {
        $query = $this->db->where('nip_pengajar', $id);
        $query = $this->db->update('data_pengajar', $data);

    }

    function take_down($id, $data) {
        $query = $this->db->where('username', $id);
        $query = $this->db->update('user', $data);

    }

    function update_data($id, $data) {
        $query = $this->db->where('nip_pengajar', $id);
        $query = $this->db->update('data_pengajar', $data);
    }
}

?>