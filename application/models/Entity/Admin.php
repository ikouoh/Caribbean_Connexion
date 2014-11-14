<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="admin")
 */
class Admin
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $nom;
    
    /**
     * @Column(type="string", length=32, nullable=false)
     */
    protected $password;
    
    /**
     * @Column(type="boolean")
     */
    protected $actif;

    
    /*
    * getters
    */

    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getActif(){
        return $this->actif;
    }

    
    /*
    * setters
    */

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }
    
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
    
    public function setActif($actif){
        $this->actif = $actif;
        return $this;
    }
    
}
