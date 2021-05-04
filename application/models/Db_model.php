<?php
class Db_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function get_data($id=null){
        $query = $this->db->get('User');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_User($id=null){
        $query = $this->db->get('User');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_Fragen($id=null){
        $query = $this->db->get('Fragen');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_Antworten($id=null){
        $query = $this->db->get('Antworten');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_Thema($id=null){
        $query = $this->db->get('Thema');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }
    public function get_data_BewertungUserAntworten($id=null){
        $query = $this->db->get('BewertungUserAntwort');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }
    public function get_data_BewertungUserFrage($id=null){
        $query = $this->db->get('BewertungUserFrage');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_FragenThema($id=null){
        $query = $this->db->get('FragenThema');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function get_data_UserThema($id=null){
        $query = $this->db->get('UserThema');
        if($id==null){
            return $query->result_array();
        } else{
            return $query->result_array()[0];
        }
    }

    public function test(){
        return "Test pos";
    }

    /**
     * Antwort create, update, delete
     */

    public function create_antwort($Content, $Time, $negBewertung, $posBewertung, $Username, $QID){
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->insert('database');
        return $this->db->insert_id();
    }
    public function delete_antwort($AID){
        $this->db->where('AID', intval($AID));
        $this->db->delete('database');
    }

    public function update_antwort($Content, $Time, $negBewertung, $posBewertung, $Username, $QID){
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->where('AID', intval($AID));
        $this->db->update('database');
    }

     /**
     * BewertungUserAntwort create, update, delete
     */


    public function create_bewertungUA($Username, $AID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('AID', $AID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->insert('database');
    }
    public function delete_bewertungUA($AID, $Username){
        $this->db->where('AID', intval($AID));
        $this->db->where('Username', $Username);
        $this->db->delete('database');
    }
    public function update_bewertungUA($Username, $AID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('AID', $AID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->where('AID', intval($AID));
        $this->db->where('Username', $Username);
        $this->db->update('database');
    }

    /**
     * BewertungUserFrage create, update, delete
     */


    public function create_bewertungUF($Username, $QID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->insert('database');
    }
    public function delete_bewertungUF($QID, $Username){
        $this->db->where('QID', intval($QID));
        $this->db->where('Username', $Username);
        $this->db->delete('database');
    }
    public function update_bewertungUF($Username, $QID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->where('QID', intval($QID));
        $this->db->where('Username', $Username);
        $this->db->update('database');
    }

    /**
     * Frage create, update, delete
     */

    public function create_frage($Headline,$Content, $Time, $negBewertung, $posBewertung, $Username){
        $this->db->set('Headline', $Headline);
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->insert('database');
        return $this->db->insert_id();
    }
    public function delete_frage($QID){
        $this->db->where('QID', intval($QID));
        $this->db->delete('database');
    }

    public function update_frage($QID, $Headline,$Content, $Time, $negBewertung, $posBewertung, $Username){
        $this->db->set('Headline', $Headline);
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->where('QID', intval($QID));
        $this->db->update('database');
    }

    /**
     * FrageThema create, update, delete
     */


    public function create_frageThema($Bezeichnung, $QID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('QID', $QID);
        $this->db->insert('database');
    }
    public function delete_frageThema($Bezeichnung, $QID){
        $this->db->where('QID', intval($QID));
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('database');
    }
    public function update_frageThema($Bezeichnung, $QID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('QID', $QID);
        $this->db->where('QID', intval($QID));
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('database');
    }

    /**
     * Thema create, update, delete
     */


    public function create_thema($Bezeichnung, $AnzahlUser){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('AnzahlUser', $AnzahlUser);
        $this->db->insert('database');
    }
    public function delete_thema($Bezeichnung){
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('database');
    }
    public function update_thema($Bezeichnung, $AnzahlUser){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('AnzahlUser', $AnzahlUser);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('database');
    }

    /**
     * User create, update, delete
     */


    public function create_user($Username, $Passwort){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('Passwort(hash)', $Passwort);
        $this->db->insert('database');
    }
    public function delete_user($Username){
        $this->db->where('Username', $Username);
        $this->db->delete('database');
    }
    public function update_user($Username, $AnzahlUser){
        $this->db->set('Username', $Username);
        $this->db->set('AnzahlUser', $Passwort);
        $this->db->where('Passwort(hash)', $Username);
        $this->db->update('database');
    }


    /**
     * UserThema create, update, delete
     */


    public function create_userThema($Bezeichnung, $Username){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->insert('database');
    }
    public function delete_userThema($Bezeichnung, $Username){
        $this->db->where('Username', $Username);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('database');
    }
    public function update_userThema($Bezeichnung, $Username){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('Username', $Username);
        $this->db->where('Username', $Username);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('database');
    }
}
