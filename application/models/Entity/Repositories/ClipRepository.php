<?php

namespace Entity\Repositories;

use Doctrine\ORM\EntityRepository;

class ClipRepository extends EntityRepository{	
    
    public function GetInfosClip($a_clip){
    	$this->ci =& get_instance();
	    //$this->ci->load->library('doctrine');
	    $this->ci->load->library('lib_orm_clip');

    	$clips = array();

    	if(is_array($a_clip) ){
    		foreach($a_clip as $clip){
    			$clips[] = $this->ci->lib_orm_clip->GetInfosClip($clip);
    		}
    	} else{
    		$clips[] = $this->ci->lib_orm_clip->GetInfosClip($a_clip);
    	}

    	return $clips;
    }

    


	public function GetClip($titre = null, $artiste = null, $genre = null, $ile = null, $annee = null, $order = 'c.annee',  $limit = null, $offet = null){
		$this->ci =& get_instance();
	    $this->ci->load->library('doctrine');
		  
		if(is_array($artiste)){
			$artiste = implode(',',$artiste);
		}

		if(is_array($ile)){
			$ile = implode(',',$ile);
		}
		
		$select = 'c';
		$from = 'Entity\Clip c';
		$where = '';
		$limit = (!is_null($limit) )? $limit: 1000;
		$offset = (!is_null($offet) )? $offet: 0;

		
	    if(is_null($artiste) && is_null($ile) ){
	    //NI artiste, NI ile

	    } elseif(!is_null($artiste) && is_null($ile) ){
	    //artiste, PAS ile
	    	$from = 'Entity\ArtisteClip ac, Entity\Clip c';

	    	$where .= "ac.clip_id = c AND ac.artiste_id IN ($artiste)";
	    } elseif(is_null($artiste) && !is_null($ile) ){
	    //PAS artiste, ile
	    	$from = 'Entity\ArtisteClip ac, Entity\ArtisteIle ai, Entity\Clip c';

	    	$where .= "ac.clip_id = c AND ac.artiste_id = ai.artiste_id AND ai.ile_id IN ($ile) ";
	    } else{
	    //artiste ET ile
	    	$from = 'Entity\ArtisteClip ac, Entity\ArtisteIle ai, Entity\Clip c';

	    	$where .= "ac.clip_id = c AND ac.artiste_id = ai.artiste_id AND ac.artiste_id IN ($artiste) AND ai.ile_id IN ($ile) ";
	    }

	    $where .= (!is_null($titre) )? " c.titre LIKE '%$titre%' ": ""; 									//vérifie le titre
            $where .= (!is_null($genre) )? ((!empty($where) )? " AND ": "")." c.genre_id = $genre ": "";		//vérifie le genre
            $where .= (!is_null($annee) )? ((!empty($where) )? " AND ": "")." c.annee LIKE '%$annee%' ": "";	//vérifie l'année
	    $where .= (!empty($where) )? "AND c.actif = 1": "c.actif = 1";

		try{
			$a_clip =  $this->ci
			   ->doctrine
			   ->em
			   ->createQuery("SELECT $select FROM $from WHERE $where ORDER BY $order")->setFirstResult($offset)->setMaxResults($limit)->getResult();

			$clips = $this->GetInfosClip($a_clip);
		    return $clips;
		}catch(\Doctrine\ORM\NoResultException $e){
		  return null;
		}
	}

	public function GetAnnee(){
            $this->ci =& get_instance();
	    $this->ci->load->library('doctrine');
	    $annees = array();

	    try{
                $a_annee =  $this->ci
                           ->doctrine
                           ->em
                           ->createQuery("SELECT DISTINCT(c.annee) FROM Entity\Clip c ORDER BY c.annee")->getResult();

                foreach($a_annee as $annee){
                        $annees[] = $annee['annee']->format('Y');
                }
                return array_unique($annees);

            }catch(\Doctrine\ORM\NoResultException $e){
              return null;
            }
	}

}
?>