<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beyond_controller extends Back_Controller {	

	public function index($artiste_id = null)
	{
		$a_data = array();
/*
		if(is_null($artiste_id) ){
			$a_data["liste"] =  true;
			$a_data["artistes"] = $this->lib_orm_artiste->GetListeArtiste();
		} else{
			$a_data["liste"] =  false;
			$a_data["artiste"] = $this->lib_orm_artiste->GetArtiste($artiste_id);
			$a_data["clips"] = $this->lib_orm_clip->GetClipByArtiste($artiste_id);;
			
			if(is_null($a_data["artiste"]) ){
				redirect('artiste', 'refresh');
			}

			$this->lib_orm->AddVue('Artiste', $artiste_id);
		}
*/
		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/beyond', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

}
