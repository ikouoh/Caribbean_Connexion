<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genre_controller extends Back_Controller {	

	public function index()
	{
		$a_data = array(
                    "genres" => $this->lib_orm_genre->GetListeGenre('id', array())
                );		

		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/genre/list', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

	public function edit($genre_id){
		$a_data = array(
                    "genre" => $this->lib_orm_genre->GetGenre($genre_id, true)
                );

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/genre/edit', $a_data);
		$this->template->build('beyond/beyond_template');
	}
        
        public function newGenre(){

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/genre/new', array());
		$this->template->build('beyond/beyond_template');
	}
}


