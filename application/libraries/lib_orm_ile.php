<?php
/*
 * librairie de gestion des 'iles'
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Lib_orm_ile extends Lib_orm{

    public function __construct() {

        parent::__construct();
    }

    /*
     * fonction de réupération des infos d'un artiste à partir de son id
     * @param int $ile_id
     */
    public function GetIle($ile_id){
        $ile = $this->GetOne('Ile', array('id' => $ile_id) );
        $a_data = null;
        //Si l'id correspond à une ile, on récupère ses infos
        if(is_object($ile) ){

            $a_data = array(
                "id" => $ile_id,
                "ile" => $ile->getIle(),
                "descriptif" => $ile->getDescriptif(),
                "vue" => $ile->getVues(),
                "image" => $ile->getImage()
            );
        }
        return $a_data;
    }
    
    /*
     * Récupération de la liste des ilese
     * @param String $by
     * @param array $where
     */
    public function GetListeIle($by='ile', $where=array('actif'=>true)){
        $iles = $this->GetAll('Ile', $where, array($by=>'ASC') );
        $a_data = array();

        foreach($iles as $ile){
            $a_data[] = array(
                "id"  => $ile->getId(),
                "ile" => $ile->getIle(),
                "actif" => $ile->getActif(),
                "vue" => $ile->getVues(),
                "descriptif" => $ile->getDescriptif(),
                "image" => $ile->getImage(),
                "voir_ile" => base_url().'ile/'.$ile->getId(),
                "edit_ile" => base_url().'beyond/ile/edit/'.$ile->getId()
            );
        }
        return $a_data;
    }
    
    /*
     * Récupération de la liste des iles pour créer un liste déroulante
     */
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

    /*
     * Récupération de la liste des artistes d'une ile
     * @param int $ile_id
     */
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

    /*
     * Récupération des clips d'une ile
     * @param int ile_id
     */
    public function GetClipsIle($ile_id){
        return $this->ci->doctrine->em->getRepository('Entity\Clip')->GetClip(null, null, null, $ile_id, null, 'c.annee');
    }
    
    /*
     * Edition d'une ile
     * @param array $data
     */
    public function EditIle($data){
        $ile = $this->GetOne('Ile', array('id'=> $data['id']) );
        $a_data = array();
        //Si l'id correspond à une ile, on modifie ses données avec les nouvelles données
        if(is_object($ile) ){
            $a_champ = array(
                "ile" => $data['ile'],
                "descriptif" => $data['descriptif'],
                "image" => (isset($data['image']))?$data['image']:'ile/'.strtolower(str_replace(' ', '', $data['ile'])).'.jpg',
                "actif" => true
            );
            $a_data = $this->UpdateTable($ile, $a_champ);
        }
        return $a_data;
    }

}
?>