<?php
/**
 * @author Niklas Ewes
 */
class Login_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function check_user($data){
        $this->db->where('Username', $data['username']);
        $this->db->where('Password', md5($data['password']));
        
        $result = $this->db->get('User')->row();
        return $result;
    }
}
?>