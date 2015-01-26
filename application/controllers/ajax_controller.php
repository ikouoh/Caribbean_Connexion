<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Controlleur ajax
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Ajax_controller extends Front_Controller {

        /*
         * Ajout d'un vue à un clip
         */
	public function AddVueClip(){
		$clip_id        = $this->input->post('clipid');
		$retour = $this->lib_orm_clip->AddVueClip($clip_id);
		$a_data = array(
			'etat' => $retour['etat'],
			'test' => "test",
		);

		echo json_encode($a_data);
	}

        /*
         * Désactivation d'un clip dont le lien est mort
         */
	public function LienMort(){
		$clip_id        = $this->input->post('clipid');
		$retour = $this->lib_orm_clip->LienMort($clip_id);
		$a_data = array(
			'etat' => $retour['etat'],
			'test' => "test",
		);
		
		echo json_encode($a_data);
	}
        
}