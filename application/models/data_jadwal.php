<?php 

class data_jadwal extends CI_Model
{
    function tampil_data() {
        $this->db->from('data_jadwal a');
        $this->db->join('data_pengajar b','a.id_pengajar=b.nip_pengajar','left');
        $this->db->join('data_kelas c','a.id_kelas=c.id_kelas','left');
        $this->db->join('mata_pelajaran d','a.id_mapel=d.id_mapel','left');
        $query = $this->db->get();
        return $query->result();
    }

    function data_detail($id) {
        return $this->db->get_where('data_kelas', array('id_kelas' => $id))->result_array();
    }

    function input_data($data){
		$this->db->insert('data_jadwal',$data);
    }

    function delete_data($id) {
        $this->db->delete('data_jadwal', array('id_jadwal' => $id));
    }

    function update_data($id, $data) {
        $query = $this->db->where('id_kelas', $id);
        $query = $this->db->update('data_kelas', $data);
    }

    // Ambil Data Kelas
    function get_kelas() {
        $query = $this->db->get('data_kelas');
        return $query->result();
    }

    // Ambil Data Mapel
    function get_mapel() {
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }

    // Ambil Data Pengajar
    function get_pengajar() {
        $query = $this->db->get('data_pengajar');
        return $query->result();
    }

    // Ambil Data Siswa
    function get_siswa() {
        $query = $this->db->get('data_siswa');
        return $query->result();
    }

}

?>