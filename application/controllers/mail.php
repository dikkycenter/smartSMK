<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mail extends MY_Controller {
	function __construct(){
		parent::__construct();		

		// Cek apakah user sudah login
		$this->cekLogin();
		// Cek Hak Akses apakah user sebagai admin
		//$this->isAdmin();

		$this->load->model('data_laporan');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->render_page('mailbox/compose');
	}

	public function send_email(){
		
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'sucinovitasari96@gmail.com',
			'smtp_pass' => 'sepuluh9',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'crlf'      => "\r\n",
			'newline'   => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('anandaroy434@gmail.com', 'suci novitasari96');
		$this->email->to('sucinovitaa96@gmail.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');  
	
		if (!$this->email->send()) {  
			show_error($this->email->print_debugger());   
		   }else{  
			echo 'Success to send email';   
		   }
	
	$this->render_page('mailbox/compose');
	}

	

	
}
