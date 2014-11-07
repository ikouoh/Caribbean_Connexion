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
    public function GetArtiste($artiste_id, $edit=false){
        $artisteIle = $this->GetOne('ArtisteIle', array('artiste_id'=> $artiste_id) );
        $a_data = null;
        //Si l'id correspond à un artiste, on récupère ses infos
        if(is_object($artisteIle) ){
            $artiste = $artisteIle->getArtiste();
            $ile = $artisteIle->getIle();
            $a_data = array(
                "id" => $artiste->getId(),
                "nom" => $artiste->getNom(),
                "bio" => $artiste->getBio(),
                "image" => $artiste->getImage(),
                "ile" => $ile->getIle(),
                "ile_id" => $ile->getId(),
                "voir_ile" => base_url().'ile/'.$ile->getId()
            ); 
        } else{
            if($edit){
                $artiste = $this->GetOne('Artiste', array('id'=> $artiste_id) );
                if(is_object($artiste) ){
                    $a_data = array(
                        "id" => $artiste->getId(),
                        "nom" => $artiste->getNom(),
                        "bio" => $artiste->getBio(),
                        "ile" => null,
                        "image" => $artiste->getImage()
                    );
                }
            }
        }

        return $a_data;
    }
    
    public function GetListeArtiste($by='nom', $where=array('actif'=>true)){
        $artistes = $this->GetAll('Artiste', $where, array($by=>'ASC') );
        $a_data = array();

        foreach($artistes as $artiste){
            $a_data[] = array(
                "id"  => $artiste->getId(),
                "nom" => $artiste->getNom(),
                "actif" => $artiste->getActif(),
                "vue" => $artiste->getVues(),
                "voir_artiste" => base_url().'artiste/'.$artiste->getId(),
                "edit_artiste" => base_url().'beyond/artiste/edit/'.$artiste->getId()
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
    
    public function EditArtiste($data){
        $artiste = $this->GetOne('Artiste', array('id'=> $data['id']) );
        if(is_object($artiste) ){
            $a_champ = array(
                "nom" => $data['id'],
                "bio" => $data['bio'],
                "image" => ($data['image']!=='')?$data['image']:'artiste/'.strtolower(str_replace(' ', '', $data['nom'])).'.jpg',
                "actif" => true
            );
            UpdateTable($artiste, $a_champ);
        }
    }

}
?>