<?php 

class data_presensi extends CI_Model
{
    function tampil_data() {
        $this->db->select('a.id_jadwal pid,a.tanggal,a.presensi,a.presensi_by,a.verifikasi_by,a.verifikasi_date,b.id_jadwal,c.id_kelas,d.nama_depan,d.nama_belakang,e.mapel,f.nama_depan nd_pengajar,f.nama_belakang nb_pengajar');
        $this->db->from('data_presensi a');
        $this->db->join('table_jadwal b','a.id_jadwal=b.id','left');
        $this->db->join('data_jadwal c','b.id_jadwal=c.id_jadwal','left');
        $this->db->join('data_siswa d','a.verifikasi_by=d.nis','left');
        $this->db->join('mata_pelajaran e','c.id_mapel=e.id_mapel','left');
        $this->db->join('data_pengajar f','a.presensi_by=f.nip_pengajar','left');
        $this->db->group_by('pid');
        $this->db->order_by('a.tanggal DESC, a.nis ASC');
        $query = $this->db->get();
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
        $this->db->where('a.tanggal', $datenow);
        $query = $this->db->get();
        return $query->result();
    }

    // Admin mengakses absensi jika terlambat absen
    function get_jadwal_admin() {
        $this->db->from('table_jadwal a');
        $this->db->join('data_jadwal b','a.id_jadwal=b.id_jadwal','left');
        $this->db->join('mata_pelajaran c','b.id_mapel=c.id_mapel','left');
        $query = $this->db->get();
        return $query->result();
    }

    // Mengambil Data Siswa
    function get_siswa($id) {
        $this->db->from('data_siswa a');
        $this->db->join('data_jadwal b','a.kelas=b.id_kelas','left');
        $this->db->join('table_jadwal c','b.id_jadwal=c.id_jadwal','left');
        $this->db->join('data_kelas d','a.kelas=d.id_kelas','left');
        $this->db->where('c.id',$id);
        $this->db->order_by('nis','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mengambil Data Mapel
    function get_mapel($id) {
        $this->db->from('table_jadwal a');
        $this->db->join('data_jadwal b','a.id_jadwal=b.id_jadwal','left');
        $this->db->join('mata_pelajaran c','b.id_mapel=c.id_mapel','left');
        $this->db->where('a.id',$id);
        // $this->db->where('a.tanggal',$datenow);
        //$this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Menyimpan data presensi
    function save_presensi($data){
        $this->db->insert_batch('data_presensi', $data);

        // if($this->db->affected_rows() > 0 ) {
        //     return TRUE;
        // }
        // return FALSE;
    }

    // Mengupdate status presensi di table jadwal
    function update_status_presensi($id_jadwal, $data2) {
        $this->db->where('id',$id_jadwal);
        $this->db->update('table_jadwal', $data2);
    }

    // Verifikasi
    function get_verifikasi($id) {
        $array = array('presensi' => 'Hadir', 'id_jadwal' => $id);

        $this->db->from('data_presensi a');
        $this->db->join('user b','a.nis=b.username','left');
        $this->db->join('data_siswa c','b.username=c.nis','left');
        $this->db->where($array);
        $this->db->order_by('rand()');
        $this->db->limit(2);

        return $this->db->get()->result_array();
    }

    function add_verifikasi($id, $data) {
        $this->db->where('id_jadwal', $id);
        $query = $this->db->update('data_presensi', $data);
    }

    // Mengupdate status verifikasi di table jadwal
    function update_status_verifikasi($id, $data2) {
        $this->db->where('id',$id);
        $this->db->update('table_jadwal', $data2);
    }

    // Verifikasi Siswa
    function get_verifikasi_siswa($table, $field1, $field2, $field3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    // function cekPresensi($id){
    //     $this->db->where('id_jadwal', $id);
    //     $query = $this->db->get('data_presensi');

    //     if($query->num_rows()>0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    function get_Presensi() { 
        $this->db->select('a.id,a.nis,b.nama_depan,b.nama_belakang,a.tanggal,e.mapel,a.presensi');
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->join('table_jadwal c','a.id_jadwal=c.id','left');
        $this->db->join('data_jadwal d','c.id_jadwal=d.id_jadwal','left');
        $this->db->join('mata_pelajaran e','d.id_mapel=e.id_mapel','left');
        $this->db->where('a.presensi','alpa');

        return $this->db->get()->result();
    }

    function tampil_presensi_detail($id){
        $this->db->select('a.id,a.nis,b.nama_depan,b.nama_belakang,a.tanggal,e.mapel,a.presensi,b.kelas,f.nama_jurusan');
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->join('table_jadwal c','a.id_jadwal=c.id','left');
        $this->db->join('data_jadwal d','c.id_jadwal=d.id_jadwal','left');
        $this->db->join('mata_pelajaran e','d.id_mapel=e.id_mapel','left');
        $this->db->join('data_kelas f','b.kelas=f.id_kelas','left');
        $this->db->where('a.id', $id);

        return $this->db->get()->result_array();
    }

    function save_update_presensi($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('data_presensi', $data);
    }

}

?>