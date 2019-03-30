<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
  function render_page($content, $data = NULL){
    
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['menu'] = $this->load->view('template/menu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/footer', $data, TRUE);
        
        $this->load->view('template/index', $data);
    }
}