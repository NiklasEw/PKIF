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
        $this->db->insert('Antworten');
        return $this->db->insert_id();
    }
    public function delete_antwort($AID){
        $this->db->where('AID', intval($AID));
        $this->db->delete('Antworten');
    }

    public function update_antwort($Content, $Time, $negBewertung, $posBewertung, $Username, $QID){
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->where('AID', intval($AID));
        $this->db->update('Antworten');
    }

     /**
     * BewertungUserAntwort create, update, delete
     */


    public function create_bewertungUA($Username, $AID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('AID', $AID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->insert('BewertungUserAntwort');
    }
    public function delete_bewertungUA($AID, $Username){
        $this->db->where('AID', intval($AID));
        $this->db->where('Username', $Username);
        $this->db->delete('BewertungUserAntwort');
    }
    public function update_bewertungUA($Username, $AID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('AID', $AID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->where('AID', intval($AID));
        $this->db->where('Username', $Username);
        $this->db->update('BewertungUserAntwort');
    }

    /**
     * BewertungUserFrage create, update, delete
     */


    public function create_bewertungUF($Username, $QID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->insert('BewertungUserFrage');
    }
    public function delete_bewertungUF($QID, $Username){
        $this->db->where('QID', intval($QID));
        $this->db->where('Username', $Username);
        $this->db->delete('BewertungUserFrage');
    }
    public function update_bewertungUF($Username, $QID, $posB, $negB){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->where('QID', intval($QID));
        $this->db->where('Username', $Username);
        $this->db->update('BewertungUserFrage');
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
        $this->db->insert('Fragen');
        return $this->db->insert_id();
    }
    public function delete_frage($QID){
        $this->db->where('QID', intval($QID));
        $this->db->delete('Fragen');
    }

    public function update_frage($QID, $Headline,$Content, $Time, $negBewertung, $posBewertung, $Username){
        $this->db->set('Headline', $Headline);
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('Username', $Username);
        $this->db->where('QID', intval($QID));
        $this->db->update('Fragen');
    }

    /**
     * FrageThema create, update, delete
     */


    public function create_frageThema($Bezeichnung, $QID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('QID', $QID);
        $this->db->insert('FragenThema');
    }
    public function delete_frageThema($Bezeichnung, $QID){
        $this->db->where('QID', intval($QID));
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('FragenThema');
    }
    public function update_frageThema($Bezeichnung, $QID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('QID', $QID);
        $this->db->where('QID', intval($QID));
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('FragenThema');
    }

    /**
     * Thema create, update, delete
     */


    public function create_thema($Bezeichnung, $AnzahlUser){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('AnzahlUser', $AnzahlUser);
        $this->db->insert('Thema');
    }
    public function delete_thema($Bezeichnung){
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('Thema');
    }
    public function update_thema($Bezeichnung, $AnzahlUser){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('AnzahlUser', $AnzahlUser);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('Thema');
    }

    /**
     * User create, update, delete
     */


    public function create_user($Username, $Passwort){
        $this->db->set('Username', $Username);
        $this->db->set('Password', $Passwort);
        $this->db->insert('User');
    }
    public function delete_user($Username){
        $this->db->where('Username', $Username);
        $this->db->delete('User');
    }
    public function update_user($Username, $AnzahlUser){
        $this->db->set('Username', $Username);
        $this->db->set('AnzahlUser', $Passwort);
        $this->db->where('Passwort(hash)', $Username);
        $this->db->update('User');
    }


    /**
     * UserThema create, update, delete
     */


    public function create_userThema($Bezeichnung, $Username){
        $this->db->set('Username', $Username);
        $this->db->set('QID', $QID);
        $this->db->insert('UserThema');
    }
    public function delete_userThema($Bezeichnung, $Username){
        $this->db->where('Username', $Username);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('UserThema');
    }
    public function update_userThema($Bezeichnung, $Username){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('Username', $Username);
        $this->db->where('Username', $Username);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('UserThema');
    }
}
