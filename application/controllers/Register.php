<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->model('Db_model');
    }
    public function view(){
        if($_POST){
            $result = $this->Register_model->check_user($_POST);


            if(empty($result)){
                $this->Db_model->create_User($_POST['username'], md5($_POST['password']));
                redirect('Home');
            } else{
                echo ("Dieser Nutzer ist bereits Regestriert");
            }
        }
        
        
        $this->load->view("register");

    }
        
}