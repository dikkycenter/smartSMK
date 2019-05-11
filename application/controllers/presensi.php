<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Cek apakah user sudah login
		$this->cekLogin();
		// Cek Hak Akses apakah user sebagai admin
		//$this->isAdmin();

		$this->load->model('data_presensi');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$hak_akses = $this->session->userdata('kategori_user');

		if ($hak_akses != '1') {
			redirect('presensi/jadwalPresensi');
			
		} else {
			$data['title'] = 'Data Presensi | SmartSMK';
			$data['presensi'] = $this->data_presensi->tampil_data();

			$this->render_page('presensi/listPresensi', $data);
		}		
	}	

	public function jadwalPresensi()
	{
		$data['title'] = 'Jadwal Presensi | SmartSMK';

		$nip_pengajar = $this->session->userdata('username');
		$datenow = date('Y-m-d');
		$data['jadwal'] = $this->data_presensi->get_jadwal_pengajar($nip_pengajar,$datenow);

		$this->render_page('presensi/jadwalPresensi', $data);
	}

	public function createPresensi($id) {
		$data['title'] = 'Presensi Siswa | SmartSMK';
		$data['mapel']	= $this->data_presensi->get_mapel($id);
		$data['array_siswa'] = $this->data_presensi->get_siswa($id);

		$this->render_page('presensi/createPresensi', $data);
	}
	
	public function savePresensi(){
		$now = date('Y-m-d H:i:s');

		$nis			= $this->input->post('nis');
		$tanggal 		= $now;
		$id_jadwal		= $this->input->post('id_jadwal');
		$presensi		= $this->input->post('presensi');
		$presensi_by 	= $this->session->userdata('username');
		
		// $data = array();
		$i = 0;

		foreach($nis as $key=>$val) {
			$data[$i]['nis']		= $val;
			$data[$i]['presensi']	 = $presensi[$key];
			$data[$i]['tanggal']	 = $tanggal;
			$data[$i]['presensi_by'] = $presensi_by;

			$i++;
			
		}	
		$this->data_presensi->save_presensi($data);		

		$this->session->set_flashdata('sukses',"Presensi sukses");

		redirect('presensi/jadwalPresensi', $data);
				
		
	}
}
