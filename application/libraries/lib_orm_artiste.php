<?php
/*
 * Librairie de gestion des 'artistes'
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Lib_orm_artiste extends Lib_orm{

    public function __construct() {

        parent::__construct();
    }

    /*
     * Récupération des infos d'un artiste à partir de son id
     * @param int $artiste_id
     * @param boolean $edit
     */
    public function GetArtiste($artiste_id, $edit=false){
        $artisteIle = $this->GetOne('ArtisteIle', array('artiste_id'=> $artiste_id) );
        $a_data = null;
        //Si l'artiste est associé à une ile, on récupère ses infos
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
            //Si on se trouve dans l'édition d'un artiste
            if($edit){
                $artiste = $this->GetOne('Artiste', array('id'=> $artiste_id) );
                //Si l'id correspond à un artiste, on récupère ses infos
                if(is_object($artiste) ){
                    $a_data = array(
                        "id" => $artiste->getId(),
                        "nom" => $artiste->getNom(),
                        "bio" => $artiste->getBio(),
                        "ile" => 0,
                        "ile_id" => 0,
                        "image" => $artiste->getImage()
                    );
                }
            }
        }

        return $a_data;
    }
    
    /*
     * Récupération de la liste des artistes
     * @param String $by
     * @param array $where
     */
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

    /*
     * Récupération de la liste des artistes d'un clip
     * @param int $clip_id
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
     * Edition d'un artiste
     * @param array $data
     */
    public function EditArtiste($data){
        $artiste = $this->GetOne('Artiste', array('id'=> $data['id']) );
        $ile = $this->GetOne('Ile', array('id'=> $data['ile_id']) );
        $artisteIle = $this->GetOne('ArtisteIle', array('artiste_id'=> $data['id']) );
        $a_data = array();
        //Si l'id correspond à un artiste, on modifie ses données avec les nouvelles données
        if(is_object($artiste) ){
            $a_champ = array(
                "nom" => $data['nom'],
                "bio" => $data['bio'],
                "image" => (isset($data['image']))?$data['image']:'artiste/'.strtolower(str_replace(' ', '', $data['nom'])).'.jpg',
                "actif" => true
            );
            //Si l'id correspond à une ile, on édite celle-ci
            if(is_object($ile) ){
                $this->EditIle($artiste, $ile, $artisteIle);
            } else{
                //Sinon, on supprime tout association de l'artiste avec une ile et désactive cette artiste
                $this->RemoveIle($artisteIle);
                $a_champ["actif"] = false;
            }
            $a_data = $this->UpdateTable($artiste, $a_champ);
        }
        return $a_data;
    }
    
    /*
     * Edition de l'ile d'un artiste
     * @param Artiste $artiste
     * @param Ile $ile
     * @param ArtisteIle $artisteIle
     */
    public function EditIle($artiste, $ile, $artisteIle){
        //Si l'artiste est déjà associé à une ile, on édite celle-ci
        if(is_object($artisteIle) ){
            //Si la nouvelle ile est différente de l'ancien, on l'édite
            if($artisteIle->getIle()->getId() !== $ile->getId() ){
                $artisteIle->setIle($ile);
                $this->em->merge($artisteIle);
            }
        } else{
            //Sinon, on crée une nouvelle association
            $artisteIle = $this->NewEntity("ArtisteIle");
            $artisteIle->setArtiste($artiste);
            $artisteIle->setIle($ile);
            $this->em->persist($artisteIle);
        }
    }
    
    /*
     * Suppression de l'ile d'un artiste
     * @param ArtisteIle $artisteIle
     */
    public function RemoveIle($artisteIle){
        if(is_object($artisteIle) ){
            $this->em->remove($artisteIle);
        }
    }

}
?>