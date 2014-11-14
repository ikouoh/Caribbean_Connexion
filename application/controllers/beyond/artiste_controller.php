<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artiste_controller extends Back_Controller {	

	public function index()
	{
		$a_data = array(
                    "artistes" => $this->lib_orm_artiste->GetListeArtiste('id', array())
                );		

		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/artiste/list', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

	public function edit($artiste_id){
		$a_data = array(
                    "artiste" => $this->lib_orm_artiste->GetArtiste($artiste_id, true),
                    "iles" => $this->lib_orm_ile->GetSelectIle()
                );

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/artiste/edit', $a_data);
		$this->template->build('beyond/beyond_template');
	}
        
        public function newArtiste(){
		//$a_data["info"] = $this->lib_orm_artiste->GetArtiste($artiste_id);

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/artiste/new', array());
		$this->template->build('beyond/beyond_template');
	}
}


