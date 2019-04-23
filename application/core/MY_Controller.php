<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
  
    public function cekLogin()
    {
      // Jika belum ada session username maka 
      // redirect ke halaman auth/login
      if (!$this->session->userdata('username')) {
        redirect('auth');
      }
    }
    
    public function getUserData()
    {
      // Ambil semua data session
      $userData = $this->session->userdata();
   
      // Return userdata
      return $userData;
    }
   
    public function isAdmin()
    {
      // Mengambil data session
      $userData = $this->getUserData();
   
      // Jika level user bukan administrator
      // maka redirect ke halaman 404
      if ($userData['hak_akses'] >1) show_404();
    } 
    
    function render_page($content, $data = NULL){
    
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['menu'] = $this->load->view('template/menu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        
        $this->load->view('template/index', $data);
    }
}