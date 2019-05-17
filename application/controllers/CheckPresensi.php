<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckPresensi extends MY_Controller {
	function __construct(){
		parent::__construct();
		
		// Cek apakah user sudah login
		$this->cekLogin();
		// Cek Hak Akses apakah user sebagai admin
		$this->isAdmin();

		//$this->load->model('data_jadwal');
        $this->load->helper('url','form');        
 
	}
	
	public function index() {
		$data['title'] = 'Form Send Email';
		$this->render_page('cekPresensi/index',$data);
	}

	public function sendEmail() {
		$config = Array(
			// 'protocol' 	=> 'sendmail',
			// 'mailpath'	=> '/usr/sbin/sendmail',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'diky.satria96@gmail.com', // change it to yours
			'smtp_pass' => 'diky1996', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
			);

		$this->load->library('email',$config);

		//$this->email->set_newline("\r\n");
		
		$email_to = $this->input->post('email');
		$email_from = 'dikysatria96@gmail.com';

		$this->email->from($email_from,'Admin TU');
		$this->email->to($email_to);
		$this->email->subject('Pemberitahuan SP');
		$this->email->message('Dengan ini diberitahukan bahwa siswa berikut: \n nis : 001 \n Nama : Adil Syahlify \n terkena SP1.');

		//Send mail
        if($this->email->send())
            $this->session->set_flashdata("sukses","Email telah berhasil dikirim.");
        else
			$this->session->set_flashdata("gagal",show_error($this->email->print_debugger()));
			
		$this->render_page('cekPresensi/index');
	}


}