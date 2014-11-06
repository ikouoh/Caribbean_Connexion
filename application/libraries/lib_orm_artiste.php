<?php
/*
librairie d'accès à la BDD via l'orm 'doctriine'
*/

class Lib_orm_artiste extends Lib_orm{

	public function __construct() {

        parent::__construct();
    }

    /*
    * fonction de réupération des infos d'un artiste à partir de son id
    */
    public function GetArtiste($artiste_id){
        $artisteIle = $this->GetOne('ArtisteIle', array('artiste_id'=> $artiste_id) );
        $a_data = null;
        //Si l'id correspond à un artiste, on récupère ses infos
        if(is_object($artisteIle) ){
            $artiste = $artisteIle->getArtiste();
            $ile = $artisteIle->getIle();
            $a_data = array(
                "nom" => $artiste->getNom(),
                "bio" => $artiste->getBio(),
                "image" => $artiste->getImage(),
                "ile" => $ile->getIle(),
                "voir_ile" => base_url().'ile/'.$ile->getId()
            ); 
        }

        return $a_data;
    }
    
    public function GetListeArtiste(){
        $artistes = $this->GetAll('Artiste', array('actif'=>true), array('nom'=>'ASC') );
        $a_data = array();

        foreach($artistes as $artiste){
            $a_data[] = array(
                "id"  => $artiste->getId(),
                "nom" => $artiste->getNom(),
                "bio" => $artiste->getBio(),
                "voir_artiste" => base_url().'artiste/'.$artiste->getId()
            );
        }
        return $a_data;
    }

    public function GetArtistesClip($clip_id){
        $a_data = array();
        $artistesClip = $this->GetAll('ArtisteClip', array('clip_id'=> $clip_id) );

        if(!empty($artistesClip) ){
            foreach($artistesClip as $artisteClip){
                $a_data[] = $artisteClip->getArtiste()->getNom();
            }

        }

        return implode(", ", $a_data);

    }

}
?>