<?php
/*
librairie d'accès à la BDD via l'orm 'doctriine'
*/

class Lib_orm_ile extends Lib_orm{

	public function __construct() {

        parent::__construct();
    }

    /*
    * fonction de réupération des infos d'un artiste à partir de son id
    */
    public function GetIle($ile_id){
        $ile = $this->GetOne('Ile', array('id' => $ile_id) );
        $a_data = null;
        //Si l'id correspond à une ile, on récupère ses infos
        if(is_object($ile) ){

            $a_data = array(
                "id" => $ile_id,
                "ile" => $ile->getIle(),
                "descriptif" => $ile->getDescriptif()
            );
        }
        return $a_data;
    }
    
    public function GetListeIle(){
        $iles = $this->GetAll('Ile', array('actif'=>true), array('ile'=>'ASC') );
        $a_data = array();

        foreach($iles as $ile){
            $a_data[] = array(
                "id"  => $ile->getId(),
                "ile" => $ile->getIle(),
                "voir_ile" => base_url().'ile/'.$ile->getId()
            );
        }
        return $a_data;
    }
    
    public function GetSelectIle(){
        $iles = $this->GetAll('Ile', array(), array('ile'=>'ASC') );
        $a_data = array(
            0 => 'Aucune'
        );

        foreach($iles as $ile){
            $a_data[$ile->getId()] = $ile->getIle();
        }
        return $a_data;
    }

    public function GetArtistesIle($ile_id){
        $artistesIle = $this->GetAll('ArtisteIle', array('ile_id' => $ile_id) );
        $a_data = null;

        //Si l'ile comporte des artistes, on récupère ceux-ci
        if(!empty($artistesIle) ){
            $a_data = array();
            foreach($artistesIle as $artisteIle){
                $artiste = $artisteIle->getArtiste();
                $a_data[] = array(
                    "id" => $artiste->getId(),
                    "nom" => $artiste->getNom(),
                    "voir_artiste" => base_url().'artiste/'.$artiste->getId()
                );
            }
        }
        return $a_data;
    }

    public function GetClipsIle($ile_id){
        /*
        $artistesIle = $this->GetAll('ArtisteIle', array('ile_id' => $ile_id) );
        $a_artistes = $a_clips = array();

        //Si l'ile comporte des artistes, on récupère ceux-ci
        if(!empty($artistesIle) ){
            foreach($artistesIle as $artisteIle){
                $artiste = $artisteIle->getArtiste();
                $a_artistes[] = $artiste->getId();
            }
        }

        //Si on a recupéré des artistes correspondant à l'ile, on récupère leurs clips associés
        if(!empty($a_artistes) ){
            $this->ci->load->library('lib_orm_clip');
            $a_clips = $this->ci->lib_orm_clip->GetClipByArtiste($a_artistes); 
        }
        return $a_clips;
*/
        return $this->ci->doctrine->em->getRepository('Entity\Clip')->GetClip(null, null, null, $ile_id, null, 'c.annee');
    }

}
?>