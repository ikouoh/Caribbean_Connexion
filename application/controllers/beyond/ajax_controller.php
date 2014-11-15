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
            echo json_encode($retour);
	}

        public function EditGenre(){
            $data = array(
                "id" => $this->input->post('id'),
                "genre" => $this->input->post('genre'),
                "descriptif" => $this->input->post('descriptif')
            );
            
            $retour = $this->lib_orm_genre->EditGenre($data);
            echo json_encode($retour);
	}
        
        public function EditIle(){
            $data = array(
                "id" => $this->input->post('id'),
                "ile" => $this->input->post('ile'),
                "descriptif" => $this->input->post('descriptif')
            );
            
            $retour = $this->lib_orm_ile->EditIle($data);
            echo json_encode($retour);
	}
        
}