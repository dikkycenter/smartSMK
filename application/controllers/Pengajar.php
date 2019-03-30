<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends MY_Controller {

	public function index()
	{
		$data['title'] = 'Data Pengajar | SmartSMK';

		$this->render_page('pengajar/listPengajar', $data);
	}

	public function tambahPengajar()
	{
		$data['title'] = 'Tambah Pengajar | SmartSMK';

		$this->render_page('pengajar/tambahPengajar', $data);
	}

}
