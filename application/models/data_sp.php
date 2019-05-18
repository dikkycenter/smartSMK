<?php 

class data_sp extends CI_Model
{
    function tampil_data_alpa() {
        $this->db->select('a.nis,count(a.presensi) total,b.nama_depan nd_siswa,b.nama_belakang nb_siswa, b.nama_wali,b.email_wali');
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->where('presensi','Alpa');
        $this->db->group_by('nis');

        return $this->db->get()->result();

    }

    function total_presensi() {
        $this->db->select('count(*) total_presensi');
        $this->db->from('data_presensi');
        $this->db->group_by('id_jadwal');   
        // $this->db->limit(1);

        return $this->db->get()->result();

    }

    function create_sending($nis) {
        $this->db->select('a.nis,count(a.presensi) total,b.nama_depan nd_siswa,b.nama_belakang nb_siswa, b.nama_wali,b.email_wali');
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->where('a.nis',$nis);
        $this->db->where('presensi','Alpa');
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }

    
}

?>