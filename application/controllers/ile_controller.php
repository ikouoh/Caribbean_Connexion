<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Controlleur ile
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Ile_controller extends Front_Controller {	

	public function index($ile_id = null){
		$a_data = array();
                //Si l'id est null, on affiche la liste des iles
		if(is_null($ile_id) ){
			$a_data["liste"] =  true;
			$a_data["iles"] = $this->lib_orm_ile->GetListeIle();
		} else{
			$a_data["liste"] =  false;
			$a_data["ile"] = $this->lib_orm_ile->GetIle($ile_id);
			$a_data["artistes"] = $this->lib_orm_ile->GetArtistesIle($ile_id);
			$a_data["clips"] = $this->lib_orm_ile->GetClipsIle($ile_id);
                        //Si l'e genre'ile n'est pas trouvée, on revient à la liste des iles
			if(is_null($a_data["ile"]) ){
				redirect('ile', 'refresh');
			}

			$this->lib_orm->AddVue('Ile', $ile_id);
		}
		
		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','ile', $a_data);
		$this->template->build('main_template');
		
	}


}
