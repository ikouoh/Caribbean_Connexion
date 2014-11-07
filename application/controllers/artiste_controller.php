<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artiste_controller extends Front_Controller {	

	public function index($artiste_id = null)
	{
		$a_data = array();

		if(is_null($artiste_id) ){
			$a_data["liste"] =  true;
			$a_data["artistes"] = $this->lib_orm_artiste->GetListeArtiste();
		} else{
			$a_data["liste"] =  false;
			$a_data["artiste"] = $this->lib_orm_artiste->GetArtiste($artiste_id);
			$a_data["clips"] = $this->lib_orm_clip->GetClipByArtiste($artiste_id);
			
			if(is_null($a_data["artiste"]) ){
				redirect('artiste', 'refresh');
			}

			$this->lib_orm->AddVue('Artiste', $artiste_id);
		}

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','artiste', $a_data);
		$this->template->build('main_template');
		
	}

	public function test($artiste_id){
		$a_data["liste"] =  false;
		$a_data["info"] = $this->lib_orm_artiste->GetArtiste($artiste_id);

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','artiste', $a_data);
		$this->template->build('main_template');
	}
}
