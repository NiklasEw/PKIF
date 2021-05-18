<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Login_model');
        $this->load->model('Db_model');
    }
    public function view(){
        if($_POST){
            $result = $this->Login_model->check_user($_POST);

            if(!empty($result)){
                $data = array(
                'id_user' => $result->ID,
                'username' => $result->Username
                );
                $this->session->set_userdata($data);
                redirect('Home');
            } else{
                $this->session->set_flashdata('flash_data', 'Passwort oder User falsch');
                $this->session->set_flashdata('flash_data', $result->ID);
                redirect('Login/view');
            }
        }
        
        $this->load->view("login");

    }
    public function logout() {
        $data = array('id_user', 'username');
        $this->session->unset_userdata($data);
        redirect('Home');
        }

        
}