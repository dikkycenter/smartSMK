<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {

	public function listSiswa()
	{
		$data['title'] = 'List Siswa | SmartSMK';

		$this->render_page('siswa/listSiswa', $data);
	}

	public function tambahSiswa()
	{
		$data['title'] = 'Tambah Siswa | SmartSMK';

		$this->render_page('siswa/tambahSiswa', $data);
	}

}
