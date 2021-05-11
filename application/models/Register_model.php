<?php
class Register_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function create_user($data){
        
        $this->db->where('Username', $data['username']);
        
        $result = $this->db->get('User')->row();
        return $result;
    }
}
?>