<?php

defined('BASEPATH') OR exit();
class Database extends CI_Controller{
    public function mydata($page='datapage'){
        if ( ! file_exists(APPPATH.'views/dataview/'.$page.'.php')){
            
            // Whoops, we don't have a page for that!
            show_404();
            }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        #$testquery = $this->Db_model->get_Data(1);//Erste Eintrag des Arrays der Datenbank
        #print_r($testquery);//Einfaches Printen, des kompletten Arrays
        $data['query'] = $this->Db_model->get_Data();
        
        
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
        $Username = $this->input->post('Username');
        $QID = $this->input->post('QID');

        $AID = $this->Db_model->create_antwort($Content, $Time, $negBewertung, $posBewertung, $Username, $QID);
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
        $Username = $this->input->post('Username');
        $QID = $this->input->post('QID');
        $AID = $this->input->post('AID');
        $this->Db_model->update_antwort($Content, $Time, $negBewertung, $posBewertung, $Username, $QID);
    }
    /**
     * BewertungUserAntwort create, update, delete
     */
    public function create_bewertungUA(){

        $Username = $this->input->post('Username');
        $AID = $this->input->post('AID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->create_bewertungUA($Username, $AID, $posB, $negB);
    }
    public function delete_bewertungUA(){
        $AID = $this->input->post('AID');
        $Username = $this->input->post('Username');
        $this->Db_model->delete_bewertungUA($AID,$Username);
    }

    public function update_bewertungUA(){
        $Username = $this->input->post('Username');
        $AID = $this->input->post('AID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->update_bewertungUA($Username, $AID, $posB, $negB);
    }

    /**
     * BewertungUserFrage create, update, delete
     */

    public function create_bewertungUF(){

        $Username = $this->input->post('Username');
        $QID = $this->input->post('QID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->create_bewertungUF($Username, $QID, $posB, $negB);
    }
    public function delete_bewertungUF(){
        $QID = $this->input->post('QID');
        $Username = $this->input->post('Username');
        $this->Db_model->delete_bewertungUF($QID,$Username);
    }

    public function update_bewertungUF(){
        $Username = $this->input->post('Username');
        $QID = $this->input->post('QID');
        $posB = $this->input->post('posB');
        $negB = $this->input->post('negB');
        $this->Db_model->update_bewertungUF($Username, $QID, $posB, $negB);
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
        $Username = $this->input->post('Username');
        

        $QID = $this->Db_model->create_frage($Headline,$Content, $Time, $negBewertung, $posBewertung, $Username);
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
        $Username = $this->input->post('Username');
        $QID = $this->input->post('QID');
        $this->Db_model->update_frage($QID,$Headline,$Content, $Time, $negBewertung, $posBewertung, $Username);
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
}