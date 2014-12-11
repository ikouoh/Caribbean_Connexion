<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Controlleur genre
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Genre_controller extends Front_Controller {	

	public function index($genre_id = null){
		$a_data = array();
                //Si l'id est null, on affiche la liste des genres
		if(is_null($genre_id) ){
			$a_data["liste"] =  true;
			$a_data["genres"] = $this->lib_orm_genre->GetListeGenre();
		} else{
			$a_data["liste"] =  false;
			$a_data["genre"] = $this->lib_orm_genre->GetGenre($genre_id);
			$a_data["clips"] = $this->lib_orm_clip->GetClipByGenre($genre_id);;
			//Si le genre n'est pas trouvé, on revient à la liste des genres
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
