<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clip_controller extends Back_Controller {	

	public function index()	{
		$a_data = array(
                    "clips" => $this->lib_orm_clip->GetListeClip('id', array())
                );		

		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/clip/list', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

	public function edit($clip_id){
		$a_data = array(
                    "clip" => $this->lib_orm_clip->GetClip(array('id' => $clip_id) ),
                    "genres" => $this->lib_orm_genre->GetSelectGenre(),
                    "artistes" => $this->lib_orm_artiste->GetSelectArtiste()
                );

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/clip/edit', $a_data);
		$this->template->build('beyond/beyond_template');
	}
        
        public function newClip(){
		$a_data = array(
                    "artistes" => $this->lib_orm_artiste->GetSelectArtiste(),
                    "genres" => $this->lib_orm_genre->GetSelectGenre(),
                );

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/clip/new', $a_data);
		$this->template->build('beyond/beyond_template');
	}
}


