<?php 

class data_presensi extends CI_Model
{
    function tampil_data() {
        $this->db->order_by('tanggal DESC, nis ASC');
        $query = $this->db->get('data_presensi');
        return $query->result();
    }    

    function get_jadwal() {
        return $this->db->get('data_jadwal')->result();
    }

    // Mengambil data jadwal absen berdasarkan tanggal absensi dan session login
    function get_jadwal_pengajar($nip_pengajar,$datenow) {
        $this->db->from('table_jadwal a');
        $this->db->join('data_jadwal b','a.id_jadwal=b.id_jadwal','left');
        $this->db->join('mata_pelajaran c','b.id_mapel=c.id_mapel','left');
        $this->db->where('b.id_pengajar', $nip_pengajar);
        $this->db->like('a.tanggal', $datenow);
        $query = $this->db->get();
        return $query->result();
    }

    // Mengambil Data Siswa
    function get_siswa($id) {
        $this->db->from('data_siswa a');
        $this->db->join('data_jadwal b','a.kelas=b.id_kelas','left');
        $this->db->join('data_kelas c','a.kelas=c.id_kelas','left');
        $this->db->where('b.id_jadwal',$id);
        $this->db->order_by('nis','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mengambil Data Mapel

    //Menyimpan data presensi
    function save_presensi($data){
        return $this->db->insert_batch('data_presensi', $data);
    }

}

?>