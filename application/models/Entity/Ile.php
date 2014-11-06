<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="ile")
 */
class Ile
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
    protected $ile;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $descriptif;

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

    public function getIle(){
        return $this->ile;
    }

    public function getDescriptif(){
        return $this->descriptif;
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

    public function setIle($ile){
        $this->ile = $ile;
        return $this;
    }

    public function setDescriptif($descriptif){
        $this->descriptif = $descriptif;
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