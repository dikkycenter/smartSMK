<?php 

class data_laporan extends CI_Model
{
    function tampil_data() {
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->join('table_jadwal c','a.id_jadwal=c.id','left');
        $this->db->join('data_jadwal d','c.id_jadwal=d.id_jadwal','left');
        $this->db->join('mata_pelajaran e','d.id_mapel=e.id_mapel','left');
        $this->db->join('data_kelas f','b.kelas=f.id_kelas','left');
        $query = $this->db->get();
        return $query->result();
    }

    function export_laporan() {
        $this->db->select('b.nama_depan nd_siswa, b.nama_belakang nb_siswa, g.nama_depan nd_pengajar, g.nama_belakang nb_pengajar, g.gelar,
        b.nis, f.id_kelas, e.mapel, a.tanggal, a.presensi, a.presensi_by, a.verifikasi_date, a.verifikasi_by');
        $this->db->from('data_presensi a');
        $this->db->join('data_siswa b','a.nis=b.nis','left');
        $this->db->join('table_jadwal c','a.id_jadwal=c.id','left');
        $this->db->join('data_jadwal d','c.id_jadwal=d.id_jadwal','left');
        $this->db->join('mata_pelajaran e','d.id_mapel=e.id_mapel','left');
        $this->db->join('data_kelas f','b.kelas=f.id_kelas','left');
        $this->db->join('data_pengajar g','a.presensi_by=g.nip_pengajar','left');
        $this->db->join('data_siswa h','a.verifikasi_by=h.nis','left');
        $query = $this->db->get();
        return $query->result();
    }
}

?>