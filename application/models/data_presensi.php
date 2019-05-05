<?php 

class data_presensi extends CI_Model
{
    function tampil_data() {
        $this->db->order_by('tanggal DESC, nis ASC');
        $query = $this->db->get('data_presensi');
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

    function get_jadwal() {
        return $this->db->get('data_jadwal')->result();
    }
}

?>