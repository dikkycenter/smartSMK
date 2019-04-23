<?php 

class data_siswa extends CI_Model
{
    function tampil_data() {
        $query = $this->db->get('data_siswa');
        return $query->result();
    }

    function data_detail($id) {
        return $this->db->get_where('data_siswa', array('nis' => $id))->result_array();
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
    }

    function delete_data($id) {
        $this->db->delete('data_pengajar', array('nip_pengajar' => $id));
        $this->db->delete('user', array('username' => $id));
    }

    function update_data($id, $data) {
        $query = $this->db->where('nis', $id);
        $query = $this->db->update('data_siswa', $data);
    }

    function tampil_kelas(){
        return $this->db->get('data_kelas')->result();
    }
}

?>