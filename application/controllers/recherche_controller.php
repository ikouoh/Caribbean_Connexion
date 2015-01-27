<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recherche_controller extends Front_Controller {	

	public function index($titre = null, $artiste = null, $ile = null, $genre = null, $annee = null){
		$a_data = array();
		$a_data['recherche'] = array(
			"titre" => $titre,
			"artiste" => $artiste,
			"ile" => $ile,
			"genre" => $genre,
			"annee" => $annee,
		);
	
		$a_data["iles"] = $this->lib_orm_ile->GetListeIle();
		$a_data["artistes"] = $this->lib_orm_artiste->GetListeArtiste();
		$a_data["genres"] = $this->lib_orm_genre->GetListeGenre();
		$a_data["annees"] = $this->lib_orm_clip->GetAnnee();

		$a_data['clips'] = $this->em->getRepository('Entity\Clip')->GetClip($titre, $artiste, $genre, $ile, $annee, 'c.annee');
		$a_data['resultat'] = !is_null($a_data['clips']);
		$a_data['nombre'] = count($a_data['clips']);

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','recherche', $a_data);
		$this->template->build('main_template');
		
	}

        
	public function resultat(){
		$titre = $artiste = $ile = $genre = $annee = null;
		if(isset($_POST) ){
			$titre = (!empty($_POST['titre']) )? $_POST['titre']: null;
			$artiste = (!empty($_POST['artiste']) )? $_POST['artiste']: null;
			$ile = (!empty($_POST['ile']) )? $_POST['ile']: null;
			$genre = (!empty($_POST['genre']) )? $_POST['genre']: null;
			$annee = (!empty($_POST['annee']) )? $_POST['annee']: null;
		}

		$this->index($titre, $artiste, $ile, $genre, $annee);
	}


}
