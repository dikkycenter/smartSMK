<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Cek apakah user sudah login
		$this->cekLogin();
		// Cek Hak Akses apakah user sebagai admin
		$this->isAdmin();

		$this->load->model('data_jadwal');
		$this->load->helper('url');
 
	}

	public function index()
	{
        $data['title'] = 'Data Jadwal | SmartSMK';
        $data['jadwal'] = $this->data_jadwal->tampil_data();
        
		$this->render_page('jadwal/listJadwal', $data);
    }
    
    public function dataDetail($id) 
	{
		$data['title']      = 'Data Detail Jadwal | SmartSMK';
		$data['info']       = 'Data Detail Jadwal';

        $data['detail']     = $this->data_jadwal->data_detail($id);
        $data['detail2']     = $this->data_jadwal->data_detail2($id);
		$this->render_page('jadwal/detailJadwal', $data);
	}

    public function tambahJadwal()
	{
        $data['title'] = 'Tambah Jadwal | SmartSMK';
        
        $data['mapel'] = $this->data_jadwal->get_mapel();
        $data['kelas'] = $this->data_jadwal->get_kelas();
        $data['pengajar'] = $this->data_jadwal->get_pengajar();

		$this->render_page('jadwal/tambahJadwal', $data);
    }
    
    function tambah_aksi() {
        $now = date('Y-m-d H:i:s');

        $id_kelas       = $this->input->post('id_kelas');
        $id_jadwal      = $this->input->post('id_jadwal');     
        $id_mapel       = $this->input->post('id_mapel');
        $id_pengajar    = $this->input->post('id_pengajar');
        $hari           = $this->input->post('hari');
        $start          = date("H:i:s", strtotime($this->input->post('start')));
        $end            = date("H:i:s", strtotime($this->input->post('end')));
        $input_date		= $now;
        $update_date	= $now;
        
        $data = array (
            'id_jadwal'     => $id_jadwal,
            'id_kelas'      => $id_kelas,
            'id_mapel'      => $id_mapel,
            'id_pengajar'   => $id_pengajar,
            'hari'          => $hari,
            'start'         => $start,
            'end'           => $end,
            'input_date'    => $input_date,
            'update_date'   => $update_date
        );

        $query = $this->data_jadwal->input_data($data);
        $this->session->set_flashdata('sukses',"Data berhasil ditambahkan");

        redirect('jadwal/index');
    }

    public function updateJadwal($id)
	{
        $data['title'] = 'Update Data Jadwal | SmartSMK';
        
        $data['detail'] = $this->data_jadwal->data_detail($id);
		$data['mapel'] = $this->data_jadwal->get_mapel();
        $data['kelas'] = $this->data_jadwal->get_kelas();
        $data['pengajar'] = $this->data_jadwal->get_pengajar();
        $data['pengajar2'] = $this->data_jadwal->get_pengajar();

		$this->render_page('jadwal/editJadwal', $data);
    }
    
    public function update_aksi($id='') {
        $now = date('Y-m-d H:i:s');

        $id_kelas       = $this->input->post('id_kelas');
        $id_jadwal      = $this->input->post('id_jadwal');     
        $id_mapel       = $this->input->post('id_mapel');
        $id_pengajar    = $this->input->post('id_pengajar');
        $id_pengajar2   = $this->input->post('id_pengajar2');
        $hari           = $this->input->post('hari');
        $start          = date("H:i:s", strtotime($this->input->post('start')));
        $end            = date("H:i:s", strtotime($this->input->post('end')));
        $update_date	= $now;
        
        $data = array (
            'id_jadwal'     => $id_jadwal,
            'id_kelas'      => $id_kelas,
            'id_mapel'      => $id_mapel,
            'id_pengajar'   => $id_pengajar,
            'id_pengajar2'  => $id_pengajar2,
            'hari'          => $hari,
            'start'         => $start,
            'end'           => $end,
            'update_date'   => $update_date
        );

        $this->data_jadwal->update_data($id, $data);
        $this->session->set_flashdata('sukses',"Data berhasil diubah");

        redirect('jadwal/index');
    }

    public function deleteJadwal($id) 
	{
		$data['delete'] = $this->data_jadwal->delete_data($id);
		$this->session->set_flashdata('sukses',"Data berhasil dihapus");

		redirect('jadwal/index');
	}

    function get_kode() {
        $id=$this->input->post('id');
        $data=$this->data_jadwal->get_kelas_detail($id);
        echo json_encode($data);
    }

    function get_pengajar2() {
        $id=$this->input->post('id');
        $data=$this->data_jadwal->get_jadwal_pengajar2($id);
        echo json_encode($data);
    }

    function createEvent($id) {
        $data['title'] = 'Membuat Event | SmartSMK';
        $data['jadwal']=$this->data_jadwal->get_idJadwal($id);
        
		$this->render_page('jadwal/createEvent', $data);
        //$query = 'CREATE EVENT $event_name ON SCHEDULE $intval DO insert into table_jadwal values (null, $tanggal, $id_jadwal)';
    }

    function createEventAction() {
        $id_jadwal      = $this->input->post('id_jadwal');
        $nama_event     = $this->input->post('nama_event');
        $intval         = $this->input->post('intval');
        $starts         = date("Y-m-d H:i:s", strtotime($this->input->post('starts')));
        $ends           = date("Y-m-d H:i:s", strtotime($this->input->post('ends')));

        $data = array (
            'tanggal'       => $starts,
            'id_jadwal'     => $id_jadwal,
            'nama_event'    => $nama_event,
            'intval'        => $intval,
            'starts'        => $starts,
            'ends'          => $ends
        );

        $data2= "CREATE EVENT `$nama_event` 
                ON SCHEDULE EVERY $intval 
                STARTS '$starts' 
                ENDS '$ends' 
                ON COMPLETION NOT PRESERVE ENABLE 
                DO insert into table_jadwal values (null,now(),'$id_jadwal','$nama_event','$intval','$starts','$ends')";

        //$query_event    = 'CREATE EVENT $event_name ON SCHEDULE $intval STARTS $starts ENDS $ends DO insert into table_jadwal values (null, $tanggal, $id_jadwal)';
        $this->data_jadwal->create_event($data, $data2);
        
        
        $this->session->set_flashdata('sukses',"Event berhasil dibuat");

        redirect('jadwal/index');
    }

    function listEvent() {
        $data['title'] = 'Update Data Jadwal | SmartSMK';
        
        $this->render_page('jadwal/listEvent', $data);
    }

}
