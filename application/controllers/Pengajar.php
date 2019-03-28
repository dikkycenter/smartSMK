<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	public function listPengajar()
	{
		$this->load->view('template/header');
		$this->load->view('pengajar/listPengajar');
	}

	public function tambahPengajar()
	{
		$this->load->view('template/header');
		$this->load->view('pengajar/tambahPengajar');
	}

}
