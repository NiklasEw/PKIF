<?php
defined('BASEPATH') OR exit();
class Frage extends CI_Controller{
    public function view($current_QID,$page='frage'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            
            // Whoops, we don't have a page for that!
            show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $data['User'] = $this->Db_model->get_data_User();
            $data['Fragen'] = $this->Db_model->get_data_Fragen();
            //Speichert alle Antworten aus der Datenbank in einem temporären Array 
            $data['tempAntworten'] = $this->Db_model->get_data_Antworten();
            //Initialisiert das finalisierte Antworten-Array, in dem sich lediglich die Antworten mit der zu der Frage passenden QID befinden
            $data['Antworten']=[];
            //Schleife, die durch jede einzelne Antwort geht
            foreach($data['tempAntworten'] AS $temp){
                //Test, ob die QID der Antwort mit der QID der Frage (current_ID) übereinstimmt:
                //Falls ja, wird die Antwort in das finalisierte Antworten-Array hinzugefügt 
                if($temp['QID']==$current_QID){
                    array_push($data['Antworten'],$temp);
                }
            }

            $data['BewertungUserFrage'] = $this->Db_model->get_data_BewertungUserFrage();
            if($data['Fragen'][$current_QID]==null){
                show_404();
            }
            $data['current_QID']=$current_QID;
            
        
        

        $this->load->library('template');
        $this->template->load('basic_template','pages/'.$page,$data);

    }
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        
    }
}