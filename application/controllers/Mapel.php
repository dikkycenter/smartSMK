<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('data_mapel');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$data['title'] = 'Data Mata Pelajaran | SmartSMK';
		$data['data_mapel'] = $this->data_mapel->tampil_data();
		$this->render_page('mapel/listMapel', $data);
	}

	public function dataDetail($id) 
	{
		$data['title'] = 'Data Detail Mata Pelajaran | SmartSMK';
		$data['info'] = 'Data Detail Mata Pelajaran';

		$data['detail'] = $this->data_mapel->data_detail($id);
		$this->render_page('mapel/detailMapel', $data);
	}

	public function deleteMapel($id) 
	{
		$data['delete'] = $this->data_mapel->delete_data($id);
		$this->session->set_flashdata('sukses',"Data berhasil dihapus");

		redirect('mapel/index');
	}

	public function tambahMapel()
	{
		$data['title'] = 'Tambah Mata Pelajaran | SmartSMK';

		$this->render_page('mapel/tambahMapel', $data);
	}

	public function tambah_aksi() {
		$id_mapel		= $this->input->post('id_mapel');
		$mapel			= $this->input->post('mapel');
		
		$data = array(
			'id_mapel'		=> $id_mapel,
			'mapel' 		=> $mapel
		);		
				
		$query = $this->data_mapel->input_data($data, 'mata_pelajaran');
		
		$this->session->set_flashdata('sukses',"Data berhasil ditambahkan");

		redirect('mapel/index');
	}

	public function updateMapel($id)
	{
		$data['title'] = 'Update Data Mata Pelajaran | SmartSMK';
		$data['detail'] = $this->data_mapel->data_detail($id);

		$this->render_page('mapel/editMapel', $data);
	}

	public function update_aksi($id='') {
		$id_mapel		= $this->input->post('id_mapel');
		$mapel			= $this->input->post('mapel');

		$data = array(
			'id_mapel'		=> $id_mapel,
			'mapel' 		=> $mapel
		);
		
		$this->data_mapel->update_data($id, $data);
		$this->session->set_flashdata('sukses',"Data berhasil dibah");
		redirect('mapel/index');
	}

	
}
