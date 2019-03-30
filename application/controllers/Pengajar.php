<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('data_pengajar');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$data['title'] = 'Data Pengajar | SmartSMK';
		$data['data_pengajar'] = $this->data_pengajar->tampil_data();

		$this->render_page('pengajar/listPengajar', $data);
	}

	public function dataDetail($id) 
	{
		$data['title'] = 'Data Detail Pengajar | SmartSMK';
		$data['info'] = 'Data Detail Pengajar';

		$data['detail'] = $this->data_pengajar->data_detail($id);
		print_r($data);
		$this->render_page('pengajar/detailPengajar', $data);

	}

	public function tambahPengajar()
	{
		$data['title'] = 'Tambah Pengajar | SmartSMK';

		$this->render_page('pengajar/tambahPengajar', $data);
	}

	public function tambah_aksi() {
		$nip_pengajar		= $this->input->post('nip_pengajar');
		$nama_depan			= $this->input->post('nama_depan');
		$nama_belakang		= $this->input->post('nama_belakang');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$newDate 			= date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
		$alamat				= $this->input->post('alamat');
		$agama				= $this->input->post('agama');
		$email				= $this->input->post('email');
		$gelar				= $this->input->post('gelar');
		$password 			= $this->input->post('password');
		$foto_pengajar		= $this->input->post('foto_pengajar');

		if (!empty($_FILES['foto_pengajar']['name'])) {
			$config['upload_path'] = './assets/images/pengajar/';
			/*add 777 permission to directory*/  
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 1024;

			$new_name = time().$_FILES['foto_pengajar']['name'];
			$config['file_name'] = $new_name;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto_pengajar')) {
				$uploadData = $this->upload->data();
				$foto_pengajar = $uploadData['file_name'];
			} else {
				$foto_pengajar = '';
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('JPG, JPEG, PNG and GIF type of file only is allowed and atleast 10MB of size');</script>";
			}
		} else {
			$foto_pengajar = '';
		}
		
		$data = array(
			'nip_pengajar'		=> $nip_pengajar,
			'nama_depan' 		=> $nama_depan,
			'nama_belakang' 	=> $nama_belakang,
			'tempat_lahir'  	=> $tempat_lahir,
			'tanggal_lahir'		=> $newDate,
			'alamat'			=> $alamat,
			'agama'				=> $agama,
			'email'				=> $email,
			'gelar'				=> $gelar,
			'foto_pengajar'		=> $foto_pengajar,
			'status_pengajar'	=> '1'
		);		
		$data2 = array(
			'username'		=> $nip_pengajar,
			'password' 		=> $password,
			'kategori_user' => '3',
			'status'  		=> '1'
			);
		
		$query = $this->data_pengajar->input_data($data, 'data_pengajar');
		$query = $this->data_pengajar->input_data($data2, 'user');
		
		// Cek apakah query insert nya sukses atau gagal
		if($query == FALSE){ // Jika sukses
			echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pengajar/index')."';</script>";
		} 
		else { // Jika gagal
			echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pengajar/tambahPengajar')."';</script>";
		}
	}

	
}
