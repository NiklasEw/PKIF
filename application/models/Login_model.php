<?php
class Login_model extends CI_Model {
    public $loginstate=false;
    public function __construct(){
        $this->load->database();
        $loginstate =false;
    }
    public function check_user($data){
        
        $this->db->where('Username', $data['username']);
        $this->db->where('Password', md5($data['password']));
        
        $result = $this->db->get('User')->row();
        print_r("test");
        return $result;
    }

    public function setLoginState($loginState){
        $loginstate = $loginState;
    }

    public function getLoginState(){
        return $this->loginstate;
    }
}
?>