<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="artiste_ile")
 */
class ArtisteIle
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Artiste")
     * @JoinColumn(name="artiste_id", referencedColumnName="id", nullable=false)
     */
    protected $artiste_id;

    /**
     *  @ManyToOne(targetEntity="Ile")
     *  @JoinColumn(name="ile_id", referencedColumnName="id", nullable=false)
     */
    protected $ile_id;


    /*
    * getters
    */

    public function getId(){
        return $this->id;
    }

    public function getArtiste(){
        return $this->artiste_id;
    }

    public function getIle(){
        return $this->ile_id;
    }


    /*
    * setters
    */

    public function setArtiste(Artiste $artiste_id= null){
        $this->artiste_id = $artiste_id;
        return $this;
    }

    public function setIle(Ile $ile = null){
        $this->ile_id = $ile;
        return $this;
    }

}