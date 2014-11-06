<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genre_controller extends Front_Controller {	

	public function index($genre_id = null)
	{
		$a_data = array();

		if(is_null($genre_id) ){
			$a_data["liste"] =  true;
			$a_data["genres"] = $this->lib_orm_genre->GetListeGenre();
		} else{
			$a_data["liste"] =  false;
			$a_data["genre"] = $this->lib_orm_genre->GetGenre($genre_id);
			$a_data["clips"] = $this->lib_orm_clip->GetClipByGenre($genre_id);;
			
			if(is_null($a_data["genre"]) ){
				redirect('genre', 'refresh');
			}

			$this->lib_orm->AddVue('Genre', $genre_id);
		}

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','genre', $a_data);
		$this->template->build('main_template');
		
	}


}
