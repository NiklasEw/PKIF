<?php
/**
 * @author Niklas Ewes
 */
defined('BASEPATH') OR exit();
class Database extends CI_Controller{
    public function mydata($page='datapage'){
        if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php')){
            
            // Whoops, we don't have a page for that!
            show_404();
            }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['User'] = $this->Db_model->get_data_User();
        $data['Fragen'] = $this->Db_model->get_data_Fragen();
        $data['Antworten'] = $this->Db_model->get_data_Antworten();
        
        
        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->set('nav', 'navigation stuff');
        $this->template->set('adress', 'My Copyright');
        $this->template->set('tel', '007');
        $this->template->load('basic_template','Dataview/'.$page,$data);
        

    }
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        
    }
    /**
     * Antwort create, update, delete
     */
    public function create_antwort(){

        $Content = $this->input->post('Content');
        $Time = $this->input->post('Time');
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');

        $AID = $this->Db_model->create_antwort($Content, $Time, $ID, $QID);
        echo $AID;
    }
    public function delete_antwort(){
        $AID = $this->input->post('AID');
        $this->Db_model->delete_antwort($AID);
    }

    public function update_antwort(){
        $Content = $this->input->post('Content');
        $Time = $this->input->post('Time');
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $AID = $this->input->post('AID');
        $this->Db_model->update_antwort($Content, $Time, $ID, $QID);
    }

    /**
     * BewertungUserFrage create, update, delete
     */

    public function create_bewertungUF(){
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        foreach($this->Db_model->get_data_BewertungUserFrage() AS $BUA){
            //Testet, ob bereits eine Bewertung dieser Frage von diesem User vorhanden ist
            if($BUA['QID']==$QID && $BUA['ID']==$ID ){
                //Falls ja werden die drei verschiedenen Möglichkeiten getestet

                //Test, ob die Bewertung in der DB schon mit dem vom User gewollten Update übereinstimmt, sodass Fragen nicht doppelt bewertet werden können
                if($BUA['posB']=="True" && $posB=="True" || $BUA['negB']=="True" && $negB=="True"){
                    return;
                }else if($BUA['posB']=="True" && $negB=="True"){//Testet, ob die vorherige Bewertung des User positiv war und die jetzt negativ werden soll
                    //Falls ja, wird die Anzahl der negativen Bewertungen um 1 erhöht und die der positiven um 1 verringert
                    $this->Db_model->incr_frage_negBewertung($QID);
                    $this->Db_model->decr_frage_posBewertung($QID);
                } else if($BUA['negB']=="True" && $posB=="True"){//Testet, ob die vorherige Bewertung des User negativ war und die jetzt positiv werden soll
                    //Falls ja, wird die Anzahl der negativen Bewertungen um 1 verringert und die der positiven um 1 erhöht
                    $this->Db_model->incr_frage_posBewertung($QID);
                    $this->Db_model->decr_frage_negBewertung($QID);
                }
                $this->Db_model->update_bewertungUF($ID, $QID, $posB, $negB);
            }
        }
        //Falls nein, wird eine neue Bewertung mit den Angaben des Users erstellt
        $this->Db_model->create_bewertungUF($ID, $QID, $posB, $negB);
    }
    public function delete_bewertungUF(){
        $QID = $this->input->post('QID');
        $ID = $this->input->post('ID');
        $this->Db_model->delete_bewertungUF($QID,$ID);
    }

    public function update_bewertungUF(){
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->update_bewertungUF($ID, $QID, $posB, $negB);
    }
    /**
     * Frage create, update, delete
     */
    public function create_frage(){
        
        $Headline = $this->input->post('Headline');
        $Content = $this->input->post('Content');
        $Time = $this->input->post('Time');
        $negBewertung = $this->input->post('negBewertung');
        $posBewertung = $this->input->post('posBewertung');
        $ID = $this->input->post('ID');
        

        $QID = $this->Db_model->create_frage($Headline,$Content, $Time, $negBewertung, $posBewertung, $ID);
        echo $QID;
    }
    public function delete_frage(){
        $QID = $this->input->post('QID');
        $this->Db_model->delete_frage($QID);
    }

    public function update_frage(){
        $Headline = $this->input->post('Headline');
        $Content = $this->input->post('Content');
        $Time = $this->input->post('Time');
        $negBewertung = $this->input->post('negBewertung');
        $posBewertung = $this->input->post('posBewertung');
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $this->Db_model->update_frage($QID,$Headline,$Content, $Time, $negBewertung, $posBewertung, $ID);
    }

    /**
     * User create, update, delete
     */
    
    public function create_user(){

        $Username = $this->input->post('Username');
        $Passwort = $this->input->post('Passwort');
        $this->Db_model->create_User($Username, $Passwort);
    }
    public function delete_user(){
        $Username = $this->input->post('Username');
        $this->Db_model->delete_user($Username);
    }

    public function update_user(){
        $Username = $this->input->post('Username');
        $Passwort = $this->input->post('Passwort');
        $this->Db_model->update_user($Username, $Passwort);
    }


    public function get_username_from_id($id=null){
        return $this->Db_model->get_data_User($id);
    }
}