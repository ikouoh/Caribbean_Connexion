<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="artiste")
 */
class Artiste
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
     * @Column(type="text", nullable=true)
     */
    protected $bio;

    /**
     * @Column(type="string", length=32, nullable=true)
     */
    protected $image;

    /**
     * @Column(type="decimal", precision=4, scale=0)
     */
    protected $vues;

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

    public function getNom(){
        return $this->nom;
    }

    public function getBio(){
        return $this->bio;
    }

    public function getImage(){
        return $this->image;
    }

    public function getVues(){
        return $this->vues;
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

    public function setBio($bio){
        $this->bio = $bio;
        return $this;
    }

    public function setImage($image){
        $this->image = $image;
        return $this;
    }

    public function setVues($vues){
        $this->vues = $vues;
        return $this;
    }
    
    public function setActif($actif){
        $this->actif = $actif;
        return $this;
    }
    
}