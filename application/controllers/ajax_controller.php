<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_controller extends Front_Controller {

	public function AddVueClip(){
		$clip_id        = $this->input->post('clipid');
		$retour = $this->lib_orm_clip->AddVueClip($clip_id);
		$a_data = array(
			'etat' => $retour['etat'],
			'test' => "test",
		);

		echo json_encode($a_data);
	}


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