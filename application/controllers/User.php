<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('data_user');
		$this->load->helper('url');
 
	}

	public function listUser()
	{
		$data['title'] = 'Kelola User | SmartSMK';

		$this->render_page('user/listUser', $data);
	}

	function tambahUser()
	{
		$data['title'] = 'Tambah User | SmartSMK';
		$data['kategori'] = $this->data_user->tampil_kategori();
		$this->render_page('user/tambahUser', $data);
	}

	function tambah_aksi(){
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
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

	function tampil_kategori(){

	}

}
