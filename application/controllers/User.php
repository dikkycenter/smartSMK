<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('data_user');
		$this->load->helper('url');
 
	}

	public function Index()
	{
		$data['title'] = 'Kelola User | SmartSMK';
		$data['data_user'] = $this->data_user->tampil_data();

		$this->render_page('user/listUser', $data);
	}

	// Tambah Data
	function tambahUser()
	{
		$data['title'] = 'Tambah User | SmartSMK';
		$data['kategori'] = $this->data_user->tampil_kategori();
		$this->render_page('user/tambahUser', $data);
	}

	function tambah_aksi(){
		$username 		= $this->input->post('username');
		$password 		= md5($this->input->post('password'));
		$kategori_user	= $this->input->post('kategori_user');
 
		$data = array(
			'username'		=> $username,
			'password' 		=> $password,
			'kategori_user' => $kategori_user,
			'status'  		=> '1'
			);
		$this->data_user->input_data($data,'user');
		redirect('user/listUser');
	}
	// End Tambah Data
	
	// Aktif atau Non Aktifkan
	function takedown($id='') {
		$data = array(			
			'status'	=> '0'
		);

		$this->data_user->takedown_data($id, $data);
		$this->session->set_flashdata('sukses',"User telah di non-aktifkan");
		redirect('user/index');
	}

	function takeup($id='') {
		$data = array(			
			'status'	=> '1'
		);

		$data2 = array(
			'status_pengajar'	=> '1'
		);

		$this->data_user->takedown_data($id, $data);
		$this->data_user->takeup_data($id, $data2);
		$this->session->set_flashdata('sukses',"User telah diaktifkan");
		redirect('user/index');
	}
	// End Aktif dan Non Aktifkan

	// Update Data
	public function updateUser($id)
	{
		$data['title'] = 'Update Data User | SmartSMK';
		$data['detail'] = $this->data_user->data_detail($id);
		$data['kategori'] = $this->data_user->tampil_kategori();

		$this->render_page('User/updateUser', $data);
	}

	public function update_aksi($id='') {
		$password 		= md5($this->input->post('password'));

		$data = array ('password'	=> $password);

		$this->data_user->update_data($id, $data);
		$this->session->set_flashdata('sukses',"Data berhasil dibah");
		redirect('user/index');
	}
	// End Update Data

}
