<?php

/*
* Controller de base
*/
class My_Controller extends CI_Controller{
    protected $em;

    function __construct() {
        //die("Caribbean Connexion IS DOWN");
        parent::__construct();

        // Récupération de Doctrine
        $this->em = $this->doctrine->em;

        //chargement de la config template
        $this->load->config('template');

        $a_data = array();       
        session_start();
        
    }


}

class Front_Controller extends My_Controller {

    function __construct() {
        //die("Caribbean Connexion Front IS DOWN");
        parent::__construct();

        //set partials template
        //$this->template->append_metadata(theme_css('design', true) );
        $this->template->set_partial('menu','menu');
        $this->template->set_partial('fb','fb');
        $this->template->set_partial('footer','footer');

        // Chargement des fichiers javascripts
        $this->_load_js();

    }

    protected function _load_js(){
        //$this->template->append_metadata(theme_js('global', true));
    }

}

class Back_Controller extends My_Controller{
    function __construct(){
        parent::__construct();

        $this->template->set_partial('menu','beyond/menu');
        $this->template->set_partial('footer','footer');
        if($_SERVER["REQUEST_URI"] != "/Caribbean_Connexion/beyond"){$this->is_admin();}
        //die($_SERVER["REQUEST_URI"]);
    }
    
    function is_admin(){
        if(isset($_SESSION["admin"])){
            ($_SESSION["admin"])?true:header('Location: '.base_url().'beyond');
        }
    }
}

