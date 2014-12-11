<?php
/*
 * Librairie d'accès à la BDD via l'orm 'doctrine'
 * @author i.kouoh
 * dernière édition 02/12/2014
 */

class Lib_orm{

    public function __construct() {

        $this->ci = &get_instance();
        $this->ci->load->library('doctrine');
        $this->em = $this->ci->doctrine->em;
    }

    /*
     * Création d'une nouvelle entité
     * @param String $Entity
     */
    public function NewEntity($Entity){
        $class = 'Entity\\'.$Entity;
        return new $class;
    }
    
   /*
    * Récupéreration d'une entité depuis la BDD
    */
    public function GetOne($Entity, $a_values){
        $a_values = (empty($a_values) )? array(): $a_values;
        $ObjetEntity = $this->em->getRepository('Entity\\'.ucfirst($Entity))->findOneBy($a_values); 
        
        return $ObjetEntity;
    }
    
    /*
     * Récupéreration de plusieurs entités depuis la BDD
     */
    public function GetAll($Entity, $a_values = array(), $a_order = array('id'=>'ASC'), $nb = null, $offset = null){
        $ObjetEntity = $this->em->getRepository('Entity\\'.ucfirst($Entity))->findBy($a_values, $a_order, $nb, $offset);

        return $ObjetEntity;
    }

   /*
    *   Mise à jour d'un ou plusieurs champs dans la BDD
    */
    public function setChamp($Entity,$a_champ){
        // Passage en paramètre de l'objet Entity et tu tableau de champ => valeur
        $etat = True;
        $message = 'Les modifications se sont bien déroulées';  
        try{
            foreach ($a_champ as $key=>$value){

                $set = "set".ucfirst($key);
                ($value != '')? $Entity->$set($value): $Entity->$set(null); //champs non rempli mis à null
            
            }
        }
        catch (Exception $e) {
            $etat = False;
            $message = 'Un problème est survenu';
        }
        $retour = array(
                    'etat'    => $etat,
                    'message' => $message
                    );
 
        return $Entity;
    }

    /*
     * MAJ d'une entité dans la BDD
     */
    public function UpdateTable($Entity,$a_champ){
        
        $etat = True;
        $message = 'Les modifications se sont bien déroulées';  
        try{
            $Entity = $this->setChamp($Entity,$a_champ);
            $this->em->merge($Entity);
            $this->em->flush();
        }
        catch (Exception $e) {
            $etat = False;
            $message = 'Un problème est survenu : '.$e;
        }

        $retour = array(
            'etat'    => $etat,
            'message' => $message,
            'entity'  => $Entity
        );

        return $retour;
  
    }


   /*
    * 
    */
    public function AddVue($entity, $entity_id){
        $Entity = $this->GetOne(ucfirst($entity), array("id"=>$entity_id) );

        $vues = $Entity->getVues() + 1;

        return $this->UpdateTable($Entity, array("vues"=>$vues) );
    }
    
   /*
    * 
    */
    public function SwitchActive($entity, $entity_id){
        $Entity = $this->GetOne(ucfirst($entity), array("id"=>$entity_id) );

        $actif = ($Entity->getActif())?false:true;

        return $this->UpdateTable($Entity, array("actif"=>$actif) );
    }


}
?>