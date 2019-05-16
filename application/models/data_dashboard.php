<?php 

class data_dashboard extends CI_Model
{
    function jumlah_pengajar() {
        $sql = "SELECT count(nip_pengajar) as nip FROM data_pengajar";
        $result = $this->db->query($sql);
        return $result->row()->nip;
    }
    
    function jumlah_siswa() {
        $sql = "SELECT count(nis) as nis FROM data_siswa";
        $result = $this->db->query($sql);
        return $result->row()->nis;
    }

    function jumlah_hadir() {
        $sql = "SELECT count(id) as jumlah FROM data_presensi";
        $query = $this->db->query($sql);
        $total = $query->row()->jumlah;

        $sql2 = "SELECT count(id) as hadir FROM data_presensi where presensi = 'Hadir'";
        $query = $this->db->query($sql2);
        $hdr = $query->row()->hadir;

        $rate = $hdr / $total *100;
        return $rate;
    }
}

?>