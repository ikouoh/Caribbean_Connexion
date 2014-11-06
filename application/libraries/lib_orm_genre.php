<?php
/*
librairie d'accès à la BDD via l'orm 'doctriine'
*/

class Lib_orm_genre extends Lib_orm{

	public function __construct() {

        parent::__construct();
    }

    /*
    * fonction de réupération des infos d'un artiste à partir de son id
    */
    public function GetGenre($genre_id){
        $genre = $this->GetOne('Genre', array('id'=> $genre_id) );
        $a_data = null;
        //Si l'id correspond à un genre, on récupère ses infos
        if(is_object($genre) ){
            $a_data = array(
                "id"  => $genre->getId(),
                "genre" => $genre->getGenre(),
                "descriptif" => $genre->getDescriptif()
            ); 
        }

        return $a_data;
    }
    
    public function GetListeGenre(){
        $genres = $this->GetAll('Genre', array('actif'=>true), array('genre'=>'ASC') );
        $a_data = array();

        foreach($genres as $genre){
            $a_data[] = array(
                "id"  => $genre->getId(),
                "genre" => $genre->getGenre(),
                "descriptif" => $genre->getDescriptif(),
                "voir_genre" => base_url().'genre/'.$genre->getId()
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