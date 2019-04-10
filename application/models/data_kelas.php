<?php 

class data_kelas extends CI_Model
{
    function tampil_data() {
        $query = $this->db->get('data_kelas');
        return $query->result();
    }

    // function data_detail($id) {
    //     return $this->db->get_where('data_kelas', array('id_kelas' => $id))->result_array();
    // }

    function input_data($data){
		$this->db->insert('data_kelas',$data);
    }

    function delete_data($id) {
        $this->db->delete('data_kelas', array('id_kelas' => $id));
    }

    function update_data($id, $data) {
        $query = $this->db->where('nip_pengajar', $id);
        $query = $this->db->update('data_pengajar', $data);
    }
}

?>