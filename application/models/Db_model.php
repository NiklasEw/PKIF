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

    public function create_antwort($Content, $Time, $negBewertung, $posBewertung, $ID, $QID){
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('ID', $ID);
        $this->db->set('QID', $QID);
        $this->db->insert('Antworten');
        return $this->db->insert_id();
    }
    public function delete_antwort($AID){
        $this->db->where('AID', intval($AID));
        $this->db->delete('Antworten');
    }

    public function update_antwort($Content, $Time, $negBewertung, $posBewertung, $ID, $QID){
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('ID', $ID);
        $this->db->set('QID', $QID);
        $this->db->where('AID', intval($AID));
        $this->db->update('Antworten');
    }

    /**
     * BewertungUserFrage create, update, delete
     */


    public function create_bewertungUF($ID, $QID, $posB, $negB){
        $this->db->set('ID', $ID);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->insert('BewertungUserFrage');


        if($posB=="True"){
            $this->incr_frage_posBewertung($QID);
        } 
        if($negB=="True") {
            $this->incr_frage_negBewertung($QID);
        }
    }
    public function delete_bewertungUF($QID, $ID){
        $this->db->where('QID', intval($QID));
        $this->db->where('ID', $ID);
        $this->db->delete('BewertungUserFrage');
    }
    public function update_bewertungUF($ID, $QID, $posB, $negB){
        
        $this->db->set('ID', $ID);
        $this->db->set('QID', $QID);
        $this->db->set('posB',$posB);
        $this->db->set('negB', $negB);
        $this->db->where('QID', intval($QID));
        $this->db->where('ID', $ID);
        $this->db->update('BewertungUserFrage');

    }

    /**
     * Frage create, update, delete
     */

    public function create_frage($Headline,$Content, $Time, $negBewertung, $posBewertung, $ID){
        $this->db->set('Headline', $Headline);
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('ID', $ID);
        $this->db->insert('Fragen');
        return $this->db->insert_id();
    }
    public function delete_frage($QID){
        $this->db->where('QID', intval($QID));
        $this->db->delete('Fragen');
    }

    public function update_frage($QID, $Headline,$Content, $Time, $negBewertung, $posBewertung, $ID){
        $this->db->set('Headline', $Headline);
        $this->db->set('Content', $Content);
        $this->db->set('Time', $Time);
        $this->db->set('negBewertung',$negBewertung);
        $this->db->set('posBewertung', $posBewertung);
        $this->db->set('ID', $ID);
        $this->db->where('QID', intval($QID));
        $this->db->update('Fragen');
    }

    //Funktion, die die positiven Bewertungen einer Frage um 1 erhöht 
    public function incr_frage_posBewertung($QID){
        //Temporäre Variable, um die Anzahl der posB zu speichern
        $temp=0;
        //Foreach-Loop, der durch jede Frage geht
        foreach($this->Db_model->get_data_Fragen() AS $frage){
            //Test, ob die QID der Frage mit der QID der gesuchten Frage übereinstimmt 
            if($frage['QID']==$QID){
                //Falls ja, wird die momentane Anzahl der posB der Frage in temp gespeichert
                $temp=$frage['posBewertung'];
                //Erhöhen der posB um 1
                $temp++;
            }
        }
        //Speichern der um 1 erhöhten posB in der DB
        $this->db->set('posBewertung',$temp);
        $this->db->where('QID',intval($QID));
        $this->db->update('Fragen');
        
        //DEBUG
        //return $temp;

    }

    //Funktion, die die positiven Bewertungen einer Frage um 1 veringert 
    public function decr_frage_posBewertung($QID){
        //Temporäre Variable, um die Anzahl der posB zu speichern
        $temp=0;
        //Foreach-Loop, der durch jede Frage geht
        foreach($this->Db_model->get_data_Fragen() AS $frage){
            //Test, ob die QID der Frage mit der QID der gesuchten Frage übereinstimmt 
            if($frage['QID']==$QID){
                //Falls ja, wird die momentane Anzahl der posB der Frage in temp gespeichert
                $temp=$frage['posBewertung'];
                //Erhöhen der posB um 1
                $temp--;
            }
        }
        //Speichern der um 1 veringerten posB in der DB
        $this->db->set('posBewertung',$temp);
        $this->db->where('QID',intval($QID));
        $this->db->update('Fragen');
        
        //DEBUG
        //return $temp;

    }

    //Funktion, die die negativen Bewertungen einer Frage um 1 erhöht 
    public function incr_frage_negBewertung($QID){
        //Temporäre Variable, um die Anzahl der negB zu speichern
        $temp=0;
        //Foreach-Loop, der durch jede Frage geht
        foreach($this->Db_model->get_data_Fragen() AS $frage){
            //Test, ob die QID der Frage mit der QID der gesuchten Frage übereinstimmt 
            if($frage['QID']==$QID){
                //Falls ja, wird die momentane Anzahl der negB der Frage in temp gespeichert
                $temp=$frage['negBewertung'];
                //Erhöhen der negB um 1
                $temp++;
            }
        }
        //Speichern der um 1 erhöhten negB in der DB
        $this->db->set('negBewertung',$temp);
        $this->db->where('QID',intval($QID));
        $this->db->update('Fragen');
        
        //DEBUG
        //return $temp;

    }

    //Funktion, die die positiven Bewertungen einer Frage um 1 veringert 
    public function decr_frage_negBewertung($QID){
        //Temporäre Variable, um die Anzahl der negB zu speichern
        $temp=0;
        //Foreach-Loop, der durch jede Frage geht
        foreach($this->Db_model->get_data_Fragen() AS $frage){
            //Test, ob die QID der Frage mit der QID der gesuchten Frage übereinstimmt 
            if($frage['QID']==$QID){
                //Falls ja, wird die momentane Anzahl der negB der Frage in temp gespeichert
                $temp=$frage['negBewertung'];
                //Erhöhen der negB um 1
                $temp--;
            }
        }
        //Speichern der um 1 veringerten negB in der DB
        $this->db->set('negBewertung',$temp);
        $this->db->where('QID',intval($QID));
        $this->db->update('Fragen');
        
        //DEBUG
        //return $temp;

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


    public function create_thema($Bezeichnung, $ID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('ID', $ID);
        $this->db->insert('Thema');
    }
    public function delete_thema($Bezeichnung){
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('Thema');
    }
    public function update_thema($Bezeichnung, $ID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('ID', $ID);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('Thema');
    }


    /**
     * UserThema create, update, delete
     */


    public function create_userThema($Bezeichnung, $ID){
        $this->db->set('ID', $ID);
        $this->db->set('QID', $QID);
        $this->db->insert('UserThema');
    }
    public function delete_userThema($Bezeichnung, $ID){
        $this->db->where('ID', $ID);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->delete('UserThema');
    }
    public function update_userThema($Bezeichnung, $ID){
        $this->db->set('Bezeichnung', $Bezeichnung);
        $this->db->set('ID', $ID);
        $this->db->where('ID', $ID);
        $this->db->where('Bezeichnung', $Bezeichnung);
        $this->db->update('UserThema');
    }
}
