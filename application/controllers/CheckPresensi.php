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
        $this->load->model('data_sp');       
 
	}
	
	public function index() {
        $data['title'] = 'Form Send Email';
        
        $data['datasp'] = $this->data_sp->tampil_data_alpa();
        $data['total_presensi'] = $this->data_sp->total_presensi();
        
		$this->render_page('cekPresensi/index',$data);
    }
    
    public function createSend($nis) {
        $data['title'] = 'Form Send Email';

        $send = $this->data_sp->create_sending($nis);

        foreach ($send as $sends) {

            require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->IsSMTP(); // we are going to use SMTP
            $mail->SMTPAuth   = true; // enabled SMTP authentication
            $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
            $mail->Host       = "ssl://smtp.gmail.com";      // setting GMail as our SMTP server
            $mail->Port       = 465;                   // SMTP port to connect to GMail
            $mail->Username   = "diky.gazali96@gmail.com";  // user email address
            $mail->Password   = "jiwasatria08";            // password in GMail
            $mail->SetFrom('diky.gazali96@gmail.com', 'Admin TU');  //Who is sending 
            $mail->isHTML(true);
            $mail->Subject    = "Pemberitahuan SP";
            $mail->Body       = "Dengan ini diberitahukan bahwa siswa berikut: <br>NIS : ".$sends['nis']."<br>Nama : ".$sends['nd_siswa']."<br> telah mendaparkan SP dengan total ketidakhadiran ".$sends['total']." Hari";
            
            $mail->AddAddress($sends['email_wali']);
            if(!$mail->Send()) {
                show_error($this->email->print_debugger());
            } else {
                $this->session->set_flashdata("sukses","Email telah berhasil dikirim.");
                redirect('checkPresensi/index');
            }
        }
        
    }

	public function sendEmail() {
        $data['title'] = 'Form Send Email';
        $nama_siswa = $this->input->post('nama_siswa');
        $sp = $this->input->post('sp');
        $nama_wali = $this->input->post('nama_wali');
        $email_wali = $this->input->post('email_wali'); 
        $nis = $this->input->post('nis');    

		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->Host       = "ssl://smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "diky.gazali96@gmail.com";  // user email address
        $mail->Password   = "jiwasatria08";            // password in GMail
        $mail->SetFrom('diky.gazali96@gmail.com', 'Admin TU');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "Pemberitahuan".$sp."";
        $mail->Body      = "Dengan ini diberitahukan bahwa siswa berikut: <br>NIS : ".$nis."<br>Nama : ".$nama_siswa."<br> telah mendaparkan ".$sp."";
        
        $mail->AddAddress($email_wali);
        if(!$mail->Send()) {
            $this->session->set_flashdata("gagal",show_error($this->email->print_debugger()));
        } else {
            $this->session->set_flashdata("sukses","Email telah berhasil dikirim.");
		}

		
		$this->render_page('cekPresensi/index',$data);
    }
    
    public function sendMail() {
        $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.google.com',
            'smtp_port' => 465,
            'smtp_user' => 'diky.gazali96@gmail.com',
            'smtp_pass' => 'jiwasatria08',
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        );

        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $email_to = $this->input->post('email');

        $this->email->from("diky.gazali96@gmail.com","Admin");
        $this->email->to($email_to);
        $this->email->subject("Email with Codeigniter");
        $this->email->message("This is email has been sent with Codeigniter");

        if($this->email->send())
        {
            $this->session->set_flashdata("sukses","Email telah berhasil dikirim.");
        } else {
            $this->session->set_flashdata("gagal",show_error($this->email->print_debugger()));
        }

        redirect('CheckPresensi/index');
    }
		
		
}