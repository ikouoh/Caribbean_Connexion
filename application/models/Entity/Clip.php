<?php

namespace Entity;

/**
 * @Entity(repositoryClass="Entity\Repositories\ClipRepository")
 * @Table(name="clip")
 */
class Clip
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=64, nullable=false)
     */
    protected $titre;

    /**
     * @Column(type="date", nullable=true)
     */
    protected $annee;

    /**
     * @ManyToOne(targetEntity="Genre")
     * @JoinColumn(name="genre_id", referencedColumnName="id", nullable=false)
     */
    protected $genre_id;

    /**
     * @Column(type="string", length=15, nullable=false)
     */
    protected $lien;

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

    public function getTitre(){
        return $this->titre;
    }

    public function getAnnee(){
        return $this->annee;
    }

    public function getGenre(){
        return $this->genre_id;
    }

    public function getLien(){
        return $this->lien;
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

    public function setTitre($titre){
        $this->titre = $titre;
        return $this;
    }

    public function setAnnee($annee){
        $this->annee = $annee;
        return $this;
    }

    public function setGenre(Object $genre = null){
        $this->genre_id = $genre;
        return $this;
    }

    public function setLien($lien){
        $this->lien = $lien;
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