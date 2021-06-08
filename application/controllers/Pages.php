<?php
/**
 * @author Cameron Biermann
 */
defined('BASEPATH') OR exit();
class Pages extends CI_Controller{
    public function view($page='home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            
            // Whoops, we don't have a page for that!
            show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $data['User'] = $this->Db_model->get_data_User();
            $data['Fragen'] = $this->Db_model->get_data_Fragen();
            $data['Antworten'] = $this->Db_model->get_data_Antworten();
            $data['BewertungUserFrage'] = $this->Db_model->get_data_BewertungUserFrage();
        
        

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->set('nav', 'navigation stuff');
        $this->template->set('adress', 'My Copyright');
        $this->template->set('tel', '007');
        $this->template->load('basic_template','pages/'.$page,$data);

    }
    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        
    }
}