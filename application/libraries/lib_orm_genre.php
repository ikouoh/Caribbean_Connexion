<?php
/*
 * Librairie de gestion des 'genres'
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Lib_orm_genre extends Lib_orm{

    public function __construct() {

        parent::__construct();
    }

   /*
    * Récupération des infos d'un artiste à partir de son id
    * @param int $genre_id
    */
    public function GetGenre($genre_id){
        $genre = $this->GetOne('Genre', array('id'=> $genre_id) );
        $a_data = null;
        //Si l'id correspond à un genre, on récupère ses infos
        if(is_object($genre) ){
            $a_data = array(
                "id"  => $genre->getId(),
                "genre" => $genre->getGenre(),
                "descriptif" => $genre->getDescriptif(),
                "vue" => $genre->getVues(),
                "image" => $genre->getImage()
            ); 
        }
        return $a_data;
    }
    
    /*
     * Récupération de la liste des genres
     * @param String $by
     * @param array $where
     */
    public function GetListeGenre($by='genre', $where=array('actif'=>true)){
        $genres = $this->GetAll('Genre', $where, array($by=>'ASC') );
        $a_data = array();

        foreach($genres as $genre){
            $a_data[] = array(
                "id"  => $genre->getId(),
                "genre" => $genre->getGenre(),
                "actif" => $genre->getActif(),
                "vue" => $genre->getVues(),
                "voir_genre" => base_url().'genre/'.$genre->getId(),
                "edit_genre" => base_url().'beyond/genre/edit/'.$genre->getId()
            );
        }
        return $a_data;
    }
    
    /*
     * Récupération de la liste des iles pour créer un liste déroulante
     */
    public function GetSelectGenre(){
        $genres = $this->GetAll('Genre', array(), array('genre'=>'ASC') );
        $a_data = array(
            0 => 'Aucun'
        );

        foreach($genres as $genre){
            $a_data[$genre->getId()] = $genre->getGenre();
        }
        return $a_data;
    }

    /*
     * A SUPPRIMER 
     */
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

    /*
     * Edition d'un genre
     * @param array $data
     */
    public function EditGenre($data){
        $genre = $this->GetOne('Genre', array('id'=> $data['id']) );
        $a_data = array();
        //Si l'id correspond à un genre, on modifie ses données avec les nouvelles données
        if(is_object($genre) ){
            $a_champ = array(
                "genre" => $data['genre'],
                "descriptif" => $data['descriptif'],
                "image" => (isset($data['image']))?$data['image']:'genre/'.strtolower(str_replace(' ', '', $data['genre'])).'.jpg',
                "actif" => true
            );
            $a_data = $this->UpdateTable($genre, $a_champ);
        }
        return $a_data;
    }
    
    /*
     * Ajout d'un nouveau genre
     * @param array $data
     */
    public function NewGenre($data){
        $genre = $this->GetOne('Genre', array('genre'=> $data['genre']) );
        $a_data = array('etat' => false);
        
        //Si le genre n'existe pas déjà dans la BDD, on peut l'ajouter
        if(!is_object($genre) ){
            $genre = $this->NewEntity("Genre");
            $genre->setVues(0);
            $genre->setActif(true);
            $this->em->persist($genre);
            
            $a_champ = array(
                "genre" => $data['genre'],
                "descriptif" => $data['descriptif'],
                "image" => (isset($data['image']))?$data['image']:'genre/'.strtolower(str_replace(' ', '', $data['genre'])).'.jpg'
            );
            
            $a_data = $this->UpdateTable($genre, $a_champ);
        }
        return $a_data;
    }
    
    /*
     * Suppresion d'un genre
     * @param int $genre_id
     */
    public function Delete($genre_id){
        $genre = $this->GetOne('Genre', array('id'=> $genre_id) );
        $a_data = array('etat' => false);
        
        //Si l'id correspond à un artiste, on modifie ses données avec les nouvelles données
        if(is_object($genre) ){
            $this->DeleteGenreClips($genre);
            $a_data = $this->DeleteEntity($genre);
        }
        
        if($a_data['etat']){
            $this->em->flush();
        }
        
        return $a_data;
    }
    /*
     * Suppresion des clips liés à un genre
     * @param Genre $Genre
     */
    public function DeleteGenreClips($Genre){
        $Clips = $this->GetAll('Clip', array('genre_id'=> $Genre->getId() ) );
        
        if(!empty($Clips) ){
            foreach($Clips as $Clip){
                $a_champ = array(
                    "genre_id" => 0,
                    "actif" => false
                );
                $this->UpdateTable($Clip, $a_champ);
            }
        }
    }
    
}
?>