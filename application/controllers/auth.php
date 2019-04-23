<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct(){
		parent::__construct();		
		$this->load->model('auth_model');
 
	}
	
	public function index()
	{
		$this->load->view('login');
    }
    
    function login() {

        if($this->auth_model->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboard");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = md5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->auth_model->check_login('user','data_pengajar','username = nip_pengajar', array('username' => $username), array('password' => $password), array('status' => "1"));

                $checking2 = $this->auth_model->check_login2('user', array('username' => $username), array('password' => $password), array('status' => "1"));
                
                
                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id_user'       => $apps->id_user,
                            'username'      => $apps->username,
                            'password'      => $apps->password,
                            'hak_akses'     => $apps->kategori_user,
                            'nama_depan'    => $apps->nama_depan,
                            'nama_belakang' => $apps->nama_belakang,
                            'foto_pengajar' => $apps->foto_pengajar,
                            'tanggal_lahir' => $apps->tanggal_lahir
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('dashboard/index2');

                    }
                }else{

                    if ($checking2 != FALSE) {
                        foreach ($checking2 as $apps) {
    
                            $session_data = array(
                                'id_user'       => $apps->id_user,
                                'username'      => $apps->username,
                                'password'      => $apps->password,
                                'hak_akses'     => $apps->kategori_user
                            );
                            //set session userdata
                            $this->session->set_userdata($session_data);
    
                            redirect('dashboard/');
    
                        }
                    } 
                    
                    else {
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                        $this->load->view('login', $data);
                    }
                    
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}