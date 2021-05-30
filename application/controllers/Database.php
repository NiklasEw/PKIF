<?php

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
        $data['Thema'] = $this->Db_model->get_data_Thema();
        $data['BewertungUserAntwort'] = $this->Db_model->get_data_BewertungUserAntworten();
        $data['BewertungUserFrage'] = $this->Db_model->get_data_BewertungUserFrage();
        $data['FragenThema'] = $this->Db_model->get_data_FragenThema();
        $data['UserThema'] = $this->Db_model->get_data_UserThema();
        
        
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
        $negBewertung = $this->input->post('negBewertung');
        $posBewertung = $this->input->post('posBewertung');
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');

        $AID = $this->Db_model->create_antwort($Content, $Time, $negBewertung, $posBewertung, $ID, $QID);
        echo $AID;
    }
    public function delete_antwort(){
        $AID = $this->input->post('AID');
        $this->Db_model->delete_antwort($AID);
    }

    public function update_antwort(){
        $Content = $this->input->post('Content');
        $Time = $this->input->post('Time');
        $negBewertung = $this->input->post('negBewertung');
        $posBewertung = $this->input->post('posBewertung');
        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $AID = $this->input->post('AID');
        $this->Db_model->update_antwort($Content, $Time, $negBewertung, $posBewertung, $ID, $QID);
    }
    /**
     * BewertungUserAntwort create, update, delete
     */
    public function create_bewertungUA(){

        $ID = $this->input->post('ID');
        $AID = $this->input->post('AID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->create_bewertungUA($ID, $AID, $posB, $negB);
    }
    public function delete_bewertungUA(){
        $AID = $this->input->post('AID');
        $ID = $this->input->post('ID');
        $this->Db_model->delete_bewertungUA($AID,$ID);
    }

    public function update_bewertungUA(){
        $ID = $this->input->post('ID');
        $AID = $this->input->post('AID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->update_bewertungUA($ID, $AID, $posB, $negB);
    }

    /**
     * BewertungUserFrage create, update, delete
     */

    public function create_bewertungUF(){

        $ID = $this->input->post('ID');
        $QID = $this->input->post('QID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
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
     * FrageThema create, update, delete
     */

    public function create_frageThema(){

        $Bezeichnung = $this->input->post('Bezeichnung');
        $QID = $this->input->post('QID');
        $this->Db_model->create_frageThema($Bezeichnung, $QID);
    }
    public function delete_frageThema(){
        $QID = $this->input->post('QID');
        $Bezeichnung = $this->input->post('Bezeichnung');
        $this->Db_model->delete_frageThema($Bezeichnung,$QID);
    }

    public function update_frageThema(){
        $Bezeichnung = $this->input->post('Bezeichnung');
        $QID = $this->input->post('QID');
        $this->Db_model->update_frageThema($Bezeichnung, $QID);
    }

    /**
     * Thema create, update, delete
     */
    public function create_thema(){

        $Bezeichnung = $this->input->post('Bezeichnung');
        $AnzahlUser = $this->input->post('AnzahlUser');
        $this->Db_model->create_thema($Bezeichnung, $AnzahlUser);
    }
    public function delete_thema(){
        $Bezeichnung = $this->input->post('Bezeichnung');
        $this->Db_model->delete_thema($Bezeichnung);
    }

    public function update_thema(){
        $Bezeichnung = $this->input->post('Bezeichnung');
        $AnzahlUser = $this->input->post('AnzahlUser');
        $this->Db_model->update_thema($Bezeichnung, $AnzahlUser);
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


    /**
     * UserThema create, update, delete
     */

    public function create_userThema(){

        $Bezeichnung = $this->input->post('Bezeichnung');
        $ID = $this->input->post('ID');
        $this->Db_model->create_userThema($Bezeichnung, $ID);
    }
    public function delete_userThema(){
        $ID = $this->input->post('ID');
        $Bezeichnung = $this->input->post('Bezeichnung');
        $this->Db_model->delete_userThema($Bezeichnung,$ID);
    }

    public function update_userThema(){
        $Bezeichnung = $this->input->post('Bezeichnung');
        $ID = $this->input->post('ID');
        $this->Db_model->update_userThema($Bezeichnung, $ID);
    }


    public function get_username_from_id($id=null){
        return $this->Db_model->get_data_User($id);
    }
}