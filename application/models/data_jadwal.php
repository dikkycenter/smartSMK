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
        $this->db->from('data_jadwal a');
        $this->db->join('data_pengajar b','a.id_pengajar=b.nip_pengajar','left');
        $this->db->join('data_kelas c','a.id_kelas=c.id_kelas','left');
        $this->db->join('mata_pelajaran d','a.id_mapel=d.id_mapel','left');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_detail2($id) {
        $this->db->from('data_jadwal a');
        $this->db->join('data_pengajar b','a.id_pengajar2=b.nip_pengajar','left');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function input_data($data){
		$this->db->insert('data_jadwal',$data);
    }

    function delete_data($id) {
        $this->db->delete('data_jadwal', array('id_jadwal' => $id));
    }

    function update_data($id, $data) {
        $query = $this->db->where('id_jadwal', $id);
        $query = $this->db->update('data_jadwal', $data);
        return "success";
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

    // Ambil Data Kelas Detail
    function get_kelas_detail($id) {
        return $this->db->get_where('data_kelas', array('id_kelas' => $id))->result_array();
    }

    // Ambil Data Jadwal Pengajar
    function get_jadwal_pengajar() {
        $this->db->from('data_jadwal a');
        $this->db->join('data_pengajar b','a.id_pengajar=b.nip_pengajar', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Ambil Data Jadwal Pengajar2
    function get_jadwal_pengajar2($id) {
        $this->db->from('data_jadwal a');
        $this->db->join('data_pengajar b','a.id_pengajar2=b.nip_pengajar', 'left');
        $this->db->where('id_pengajar2',$id);
        return $this->db->get()->result_array();
    }

    // Membuat Event Scheduler
    function create_event($data, $data2) {               
        $this->db->query($data2);
        $this->db->insert('table_jadwal',$data);
    }

    // List Data Event by ID
    function tampil_event($id) {
        return $this->db->get_where('table_jadwal', array('nama_event' => $id));
    }

    // Mengecek apakah event tidak kosong
    // function check_event() {
    //     $query = $this->db->get_where('table_jadwal', array('nama_event' => $id));
    //     if ($query->num_rows > 0) {
    //         return 1;
    //     } else {
    //         return 0;
    //     }

    // }

    // Mengambil Data id_jadwal 
    function get_idJadwal($id) {
        return $this->db->get_where('data_jadwal', array('id_jadwal' => $id))->result_array();
    }
}

?>