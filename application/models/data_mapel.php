<?php 

class data_mapel extends CI_Model
{
    function tampil_data() {
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }

    function data_detail($id) {
        return $this->db->get_where('mata_pelajaran', array('id_mapel' => $id))->result_array();
    }

    function input_data($table,$data){
		$this->db->insert($data,$table);
    }

    function delete_data($id) {
        $this->db->delete('mata_pelajaran', array('id_mapel' => $id));
    }

    function update_data($id, $data) {
        $query = $this->db->where('id_mapel', $id);
        $query = $this->db->update('mata_pelajaran', $data);
    }
}

?>