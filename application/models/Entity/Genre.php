<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="genre")
 */
class Genre
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=64, unique=true, nullable=false)
     */
    protected $genre;

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

    public function getGenre(){
        return $this->genre;
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

    public function setGenre($genre){
        $this->genre = $genre;
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