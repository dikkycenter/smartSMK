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
    }
	public function index()
	{
		// Cek apakah user login 
		// sebagai administrator
		$this->isAdmin();
		
		$data['title'] = 'Dashboard | SmartSMK';

		$this->render_page('home', $data);
		
	}

	public function index2()
	{
		$data['title'] = 'Dashboard 2 | SmartSMK';

		$this->render_page('home2', $data);
		
	}
}
