<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Front_Controller {	

	public function index(){
		$a_data = array(
			"plus_vues" => $this->em->getRepository('Entity\Clip')->GetClip(null, null, null, null, null, 'c.vues DESC', 5, null),
		);

		$listeGenre = $this->lib_orm_genre->GetListeGenre();

		foreach($listeGenre as $genre){
		    $clips = $this->em->getRepository('Entity\Clip')->GetClip(null, null, $genre['id'], null, null, 'c.id DESC', 5, null);
                    if(!empty($clips) ){
                        $a_data['genres'][$genre['genre']] = $clips;
                    }
		}

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','ohm', $a_data);
		$this->template->build('main_template');
		
	}
        
        public function test(){
            $this->template->title('test');
            $this->template->set_partial('content','test');
            $this->template->build('main_template');
        }

	
}
