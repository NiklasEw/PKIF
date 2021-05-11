<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Register_model');
    }
    public function view(){
        
        
        $this->load->view("register");

    }
    public function logout() {
        $data = array('id_user', 'username');
        $this->session->unset_userdata($data);
        redirect('Home');
        }

        
}