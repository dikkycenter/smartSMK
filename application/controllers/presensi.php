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
		//$hak_akses = $this->session->userdata('kategori_user');

		if ($this->session->userdata('hak_akses') != '1') {
			redirect('presensi/jadwalPresensi');
			
		} else {
			$data['title'] = 'Data Presensi | SmartSMK';
			$data['presensi'] = $this->data_presensi->tampil_data();
			
			//redirect('presensi/cekPresensi/'.$id_jadwal, $data);	

			$this->render_page('presensi/listPresensi', $data);
			

		}		
	}	

	public function updatePresensi()
	{
		$this->isAdmin();

		$data['title'] = 'Update Presensi | SmartSMK';
		$data['data_presensi'] = $this->data_presensi->get_presensi();
		$this->render_page('presensi/updatePresensi', $data);
	}

	public function updatePresensiDetail($id){
		$this->isAdmin();
		
		$data['title'] = 'Update Presensi | SmartSMK';
		$data['data_presensi'] = $this->data_presensi->tampil_presensi_detail($id);
		$this->render_page('presensi/updatePresensiDetail', $data);
	}

	public function save_updatePresensi(){
		$id			= $this->input->post('pid');
		$presensi 	= $this->input->post('presensi');

		$data = array(
			'presensi'	=> $presensi
		);

		$this->data_presensi->save_update_presensi($id, $data);

		$this->session->set_flashdata('sukses',"Presensi berhasil diupdate");
		redirect('presensi/updatePresensi');

	}

	public function jadwalPresensi()
	{
		$data['title'] = 'Jadwal Presensi | SmartSMK';
		$id = $this->input->post('id_jadwal');

		if ($this->session->userdata('hak_akses') != '1') {

			$nip_pengajar = $this->session->userdata('username');
			$datenow = date('Y-m-d');
			$data['jadwal'] = $this->data_presensi->get_jadwal_pengajar($nip_pengajar,$datenow);
			$data['cek_presensi'] = $this->data_presensi->cek_presensi($id);
			
		} else {

			$data['jadwal'] = $this->data_presensi->get_jadwal_admin();

		}		

		$this->render_page('presensi/jadwalPresensi', $data);
		
	}

	public function createPresensi($id) {
		$data['title'] = 'Presensi Siswa | SmartSMK';
		$datenow = date('Y-m-d');

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
			$data[$i]['id_jadwal']	= $id_jadwal;
			$data[$i]['presensi']	 = $presensi[$key];
			$data[$i]['tanggal']	 = $tanggal;
			$data[$i]['presensi_by'] = $presensi_by;

			$i++;
			
		}	
		$this->data_presensi->save_presensi($data);		

		$this->session->set_flashdata('sukses',"Presensi sukses. Silahkan Verifikasi!");

		redirect('presensi/formVerifikasi/'.$id_jadwal, $data);			
		
	}

	function formVerifikasi($id) {
		$data['title'] = 'Form Verifikasi | SmartSMK';
		$data['getSiswa'] = $this->data_presensi->get_verifikasi($id);

		$this->render_page('presensi/formVerifikasi', $data);
	}

	function save_verifikasi($id='') {
		$now = date('Y-m-d H:i:s');
		$nis = $this->input->post('nis');
		$password = md5($this->input->post('password'));
		
		$checking = $this->data_presensi->get_verifikasi_siswa('user', array('username' => $nis), array('password' => $password), array('status' => "1"));

		$id = $this->input->post('id_jadwal');
		$verifikasi_by = $this->input->post('nis');
		$verifikasi_date = $now;
		$password = md5($this->input->post('password'));

		if ($checking != FALSE) {
			$data = array(
				'verifikasi_by'       => $verifikasi_by,
				'verifikasi_date'      => $verifikasi_date
			);
			//set session userdata
			$this->data_presensi->add_verifikasi($id, $data);

			$this->session->set_flashdata('sukses',"Verifikasi telah berhasil");

			redirect('presensi/jadwalPresensi');
		} else {
			//$data['error'] = '<script language="javascript"> alert("Password Salah, Silahkan Ulangi."); </script>';
			$data['getSiswa'] = $this->data_presensi->get_verifikasi($id);

			$this->session->set_flashdata('gagal',"Password salah, verifikasi gagal. Silahkan ulangi");

			redirect('presensi/formVerifikasi/'.$id, $data);
		}

		//$this->session->set_flashdata('sukses',"Verifikasi telah berhasil");

		//redirect('presensi/jadwalPresensi');

		function cekJadwal($id){
			$tes=0;
			if($this->data_presensi->cekPresensi($id)){
				$tes= 1;
			} else{
				$tes=0;
			}
		}

	}
}
