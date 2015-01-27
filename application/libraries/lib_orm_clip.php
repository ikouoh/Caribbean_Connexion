<?php
/*
 * Librairie de gestion des 'clips'
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Lib_orm_clip extends Lib_orm{

    public function __construct() {

        parent::__construct();
    }

    /*
    * Récupération d'un clip à partir de son id
    * @param int $clip_id
    */
    public function GetClip($clip_id){
        $clip = $this->GetOne('Clip', array('id'=> $clip_id) );
        $a_data = null;
        //Si l'id correspond à un genre, on récupère ses infos
        if(is_object($clip) ){
            $a_data = $this->GetInfosClip($clip); 
        }
        return $a_data;
    }
    
    /*
     * Récupération de la liste des clips
     * @param String $by
     * @param array $where
     */
    public function GetListeClip($by='id', $where=array('actif'=>true)){
        $clips = $this->GetAll('Clip', $where, array($by=>'ASC') );
        $a_data = array();

        foreach($clips as $clip){
            $a_data[] = $this->GetInfosClip($clip);
        }
        return $a_data;
    }

    /*
     * Récupération des infos d'un clip
     * @param Clip $clip
     */
    public function GetInfosClip($clip){
        $data = null;
        if(is_object($clip) ){
            $data =  array(
                "id" => $clip->getId(),
                "titre" => $clip->getTitre(),
                "artistes" => $this->ci->lib_orm_artiste->GetArtistesClip($clip->getId() ),
                "artistes_id" => $this->ci->lib_orm_artiste->GetArtistesClipId($clip->getId() ),
                "annee" => $clip->getAnnee()->format('Y'),
                "genre" => ($clip->getGenre() != null)? $clip->getGenre()->getGenre():'none',
                "genre_id" => ($clip->getGenre() != null)? $clip->getGenre()->getId():0,
                "actif" => $clip->getActif(),
                "vue" => $clip->getVues(),
                "lien" => $clip->getLien(),
                "edit_clip" => base_url().'beyond/clip/edit/'.$clip->getId(),
                "embed" => "<embed src=\"http://www.youtube.com/v/".$clip->getLien()."?fs=1&amp;hl=fr_FR&amp;rel=0&amp;hd=1&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;autoplay=1\type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"640\" height=\"360\"/>"
            );
        }
        return $data;
    }

    /*
     * Récupération des clips d'un artiste
     * @param int $artiste_id
     */
    public function GetClipByArtiste($artiste_id){	
        return $this->ci->doctrine->em->getRepository('Entity\Clip')->GetClip(null, $artiste_id, null, null, null, 'c.annee', null,  null);  
    }

    /*
     * Récupération des clips d'un genre
     * @param int $genre_id
     */
    public function GetClipByGenre($genre_id){
        return $this->ci->doctrine->em->getRepository('Entity\Clip')->GetClip(null, null, $genre_id, null, null, 'c.annee');
    }

    /*
     * Récupération de la liste des années des clips
     */
    public function GetAnnee(){
        return $this->ci->doctrine->em->getRepository('Entity\Clip')->GetAnnee();
    }
    
    /*
     * Edition d'un clip
     * @param array $data
     */
    public function EditClip($data){
        $clip = $this->GetOne('Clip', array('id'=> $data['id']) );
        $genre = $this->GetOne('Genre', array('id'=> $data['genre']) );
        $a_data = array();
        //Si l'id correspond à un artiste, on modifie ses données avec les nouvelles données
        if(is_object($clip) ){
            $a_champ = array(
                "titre" => $data['titre'],
                "annee" => DateTime::createFromFormat ('Y', $data['annee']),
                "lien" => $data['lien'],
                "actif" => true
            );
            //Si l'id correspond à une ile, on édite celle-ci
            if(is_object($genre) ){
                $a_champ["genre"] = $genre;
            } else{
                $a_champ["genre"] = null;
                $a_champ["actif"] = false;
            }
            //
            $this->EditArtistesClip($data['artistes'], $clip);
            
            $a_data = $this->UpdateTable($clip, $a_champ);
        }
        return $a_data;
    }
    
    /*
     * Edition des artistes d'un clip
     * @param Array<int> $artistes
     * @param Clip $clip
     */
    public function EditArtistesClip($artistes, $clip){
        // Suppression de toutes les liaisons artiste-clip de ce clip
        if($this->DeleteArtistesClip($clip) ){
            if(!empty($artistes) ){
                // Si toutes les liaisons ont bien été supprimé, on en crée de nouvelles
                foreach($artistes as $artiste_id){
                    $artiste = $this->GetOne('Artiste', array('id'=> $artiste_id) );
                    if(is_object($artiste) ){
                        //Sinon, on crée une nouvelle association
                        $artisteClip = $this->NewEntity("ArtisteClip");
                        $artisteClip->setArtiste($artiste);
                        $artisteClip->setClip($clip);
                        $this->em->persist($artisteClip);
                    }
                }
            }
        }
    }
    
    /*
     * Suppresion des clips d'un artiste
     * @param Clip $clip
     */
    public function DeleteArtistesClip($clip){
        $artisteClips = $this->GetAll('ArtisteClip', array('clip_id'=> $clip->getId() ) );
        $retour = true;
        
        if(!empty($artisteClips) ){
            foreach($artisteClips as $artisteClip){
                $a_data = $this->DeleteEntity($artisteClip);
                $retour = $retour && $a_data['etat'];
            }
        }
        return $retour;
    }
    
    /*
     * Suppresion d'un clip
     * @param int $clip_id
     */
    public function Delete($clip_id){
        $clip = $this->GetOne('Clip', array('id'=> $clip_id) );
        $a_data = array('etat' => false);
        
        //Si l'id correspond à un artiste, on modifie ses données avec les nouvelles données
        if(is_object($clip) ){
            if($this->DeleteArtistesClip($clip) ){
                $a_data = $this->DeleteEntity($clip);
            }
        }
        
        if($a_data['etat']){
            $this->em->flush();
        }
        
        return $a_data;
    }
    
    /*
     * Ajout d'un nouveau clip
     * @param array $data
     */
    public function NewClip($data){
        $clip = $this->GetOne('Clip', array('lien'=> $data['lien']) );
        $a_data = array(
            'etat' => false,
            'message' => "Le lien utilisé correspond déjà à un autre clip"
        );
        
        // Si l'artiste n'existe pas déjà dans la BDD, on peut l'ajouter
        if(!is_object($clip) ){
            $genre = $this->GetOne('Genre', array('id'=> $data['genre']) );
            $clip = $this->NewEntity("Clip");
            $clip->setVues(0);
            $clip->setActif(false);
            $this->em->persist($clip);
            
            $a_champ = array(
                "titre" => $data['titre'],
                "annee" => DateTime::createFromFormat ('Y', $data['annee']),
                "lien" => $data['lien'],
                "genre" => (is_object($genre) )? $genre:null
            );            
            
            //
            $this->EditArtistesClip($data['artistes'], $clip);
            
            $a_data = $this->UpdateTable($clip, $a_champ);
        } 
        
        return $a_data;
    }
    

    /*
     * A SUPPRIMER, UTILISER FCT DANS LIB_ORM
     */
    public function AddVueClip($clip_id){
        $clip = $this->GetOne('Clip', array("id"=>$clip_id) );

        $vues = $clip->getVues() + 1;

        return $this->UpdateTable($clip, array("vues"=>$vues) );
    }

    /*
     * UTILISER FCT DANS LIB_ORM
     */
    public function LienMort($clip_id){
        $clip = $this->GetOne('Clip', array("id"=>$clip_id) );

        return $this->UpdateTable($clip, array("actif"=>0) );
    }

    

}
?>