<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		
		// Cek apakah user sudah login
		$this->cekLogin();
 
        //load model admin
		$this->load->model('auth_model');
		$this->load->model('data_dashboard');
    }
	public function index()
	{
		// Cek apakah user login 
		// sebagai administrator
		$this->isAdmin();
		
		$data['title']	= 'Dashboard | SmartSMK';
		$data['pengajar'] 	= $this->data_dashboard->jumlah_pengajar();
		$data['siswa'] 	= $this->data_dashboard->jumlah_siswa();
		$data['rate_hadir'] 	= $this->data_dashboard->jumlah_hadir();
		$this->render_page('home', $data);
		
	}

	public function index2()
	{
		$data['title'] = 'Dashboard | SmartSMK';
		$data['pengajar'] 	= $this->data_dashboard->jumlah_pengajar();
		$data['siswa'] 	= $this->data_dashboard->jumlah_siswa();
		$data['rate_hadir'] 	= $this->data_dashboard->jumlah_hadir();
		$this->render_page('home2', $data);
		
	}
}
