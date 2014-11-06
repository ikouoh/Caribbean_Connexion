<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="artiste_clip")
 */
class ArtisteClip
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
     *  @ManyToOne(targetEntity="Clip")
     *  @JoinColumn(name="clip_id", referencedColumnName="id", nullable=false)
     */
    protected $clip_id;


    /*
    * getters
    */

    public function getId(){
        return $this->id;
    }

    public function getArtiste(){
        return $this->artiste_id;
    }

    public function getClip(){
        return $this->clip_id;
    }


    /*
    * setters
    */

    public function setArtiste(Object $artiste = null){
        $this->artiste_id = $artiste;
        return $this;
    }

    public function setClip(Object $clip = null){
        $this->clip_id = $clip;
        return $this;
    }

}