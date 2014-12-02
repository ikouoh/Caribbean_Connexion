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
     * A SUPPRIMER
     */
    public function GetClip($a_values = array() ){
    	$clips = $this->GetAll('Clip', $a_values);
    	$a_data = null;

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
                "annee" => $clip->getAnnee()->format('Y'),
                "genre" => $clip->getGenre()->getGenre(),
                "lien" => $clip->getLien(),
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

    
/*
    //bloc formulairee probleme video
        $form ="
        <div id='sup$id' style='display:none'>
        <form method='post' action='$uri'>
        <input type='radio' name='pb' value='vidéo supprimé' id='vs$id'><label for='vs$id'>vidéo supprimé</label>
        <input type='radio' name='pb' value='intégration impossible' id='ii$id'><label for='ii$id'>intégration impossible</label>
        <input type='radio' name='pb' value='autre' id='a$id'><label for='a$id'>autre</label>
        </br>
        <input type='hidden' name='idsup'  value='$id'>
        <input type='submit' name='sup' value='Signaler'>
        </form>
        </div>";
*/
}
?>