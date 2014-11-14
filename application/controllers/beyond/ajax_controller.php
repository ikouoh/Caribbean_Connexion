<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_controller extends Back_Controller {

	public function SwitchActive(){
		$id = $this->input->post('id');
                $entity = $this->input->post('entity');
		$retour = $this->lib_orm->SwitchActive(ucfirst($entity), $id);
		$a_data = array(
			'etat' => $retour['etat'],
		);

		echo json_encode($a_data);
	}
        
        public function EditArtiste(){
            $data = array(
                "id" => $this->input->post('id'),
                "nom" => $this->input->post('nom'),
                "ile_id" => $this->input->post('ile_id'),
                "bio" => $this->input->post('bio')
            );
            
            $retour = $this->lib_orm_artiste->EditArtiste($data);
            $a_data = array(
                    'etat' => $retour['etat'],
            );

            echo json_encode($retour);
	}

/*
	public function LienMort(){
		$clip_id        = $this->input->post('clipid');
		$retour = $this->lib_orm_clip->LienMort($clip_id);
		$a_data = array(
			'etat' => $retour['etat'],
			'test' => "test",
		);
		
		echo json_encode($a_data);
	}
*/
}