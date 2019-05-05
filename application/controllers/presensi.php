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
		$data['title'] = 'Data Presensi | SmartSMK';
		$data['presensi'] = $this->data_presensi->tampil_data();
		$this->render_page('presensi/listPresensi', $data);
	}

	public function deleteKelas($id) 
	{
		$data['delete'] = $this->data_kelas->delete_data($id);
		$this->session->set_flashdata('sukses',"Data berhasil dihapus");

		redirect('kelas/index');
	}

	public function jadwalPresensi()
	{
		$data['title'] = 'Jadwal Presensi | SmartSMK';
		$data['jadwal'] = $this->data_presensi->get_jadwal();

		$this->render_page('presensi/jadwalPresensi', $data);
	}

	public function tambah_aksi() {
		$id_kelas			= $this->input->post('id_kelas');
		$nama_kelas			= $this->input->post('nama_kelas');
		$nama_jurusan		= $this->input->post('nama_jurusan');
		$keterangan			= $this->input->post('keterangan');
		
		$data = array(
			'id_kelas'			=> $id_kelas,
			'nama_kelas'		=> $nama_kelas,
			'nama_jurusan'		=> $nama_jurusan,
			'keterangan'		=> $keterangan,
		);		
		
		$query = $this->data_kelas->input_data($data);

		$this->session->set_flashdata('sukses',"Data berhasil ditambahkan");

		redirect('kelas/index');
	}

	public function updateKelas($id)
	{
		$data['title'] = 'Update Data Kelas | SmartSMK';
		$data['detail'] = $this->data_kelas->data_detail($id);

		$this->render_page('kelas/editKelas', $data);
	}

	public function update_aksi($id='') {
		$id_kelas			= $this->input->post('id_kelas');
		$nama_kelas			= $this->input->post('nama_kelas');
		$nama_jurusan		= $this->input->post('nama_jurusan');
		$keterangan			= $this->input->post('keterangan');
		
		$data = array(
			'id_kelas'			=> $id_kelas,
			'nama_kelas'		=> $nama_kelas,
			'nama_jurusan'		=> $nama_jurusan,
			'keterangan'		=> $keterangan,
		);		
		
		$this->data_kelas->update_data($id, $data);
		$this->session->set_flashdata('sukses',"Data berhasil dibah");
		redirect('kelas/index');
	}

	
}
