<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\ClassementRepository")
 */
class Classement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
   /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="classement")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $users;

    /**
     * @var string
     *
     * @ORM\Column(name="nomStat", type="string", length=255)
     */
    private $nomStat;

    /**
     * @var integer
     *
     * @ORM\Column(name="technique", type="integer")
     */
    private $technique;

    /**
     * @var integer
     *
     * @ORM\Column(name="fairplay", type="integer")
     */
    private $fairplay;

    /**
     * @var integer
     *
     * @ORM\Column(name="ambiance", type="integer")
     */
    private $ambiance;

    /**
     * @var integer
     *
     * @ORM\Column(name="general", type="integer")
     */
    private $general;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreMatch", type="integer")
     */
    private $nombreMatch;

    /**
     * @var integer
     *
     * @ORM\Column(name="victoire", type="integer")
     */
    private $victoire;

    /**
     * @var integer
     *
     * @ORM\Column(name="defaite", type="integer")
     */
    private $defaite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="derniereRencontre", type="datetime")
     */
    private $derniereRencontre;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomStat
     *
     * @param string $nomStat
     * @return Classement
     */
    public function setNomStat($nomStat)
    {
        $this->nomStat = $nomStat;

        return $this;
    }

    /**
     * Get nomStat
     *
     * @return string 
     */
    public function getNomStat()
    {
        return $this->nomStat;
    }

    /**
     * Set technique
     *
     * @param integer $technique
     * @return Classement
     */
    public function setTechnique($technique)
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * Get technique
     *
     * @return integer 
     */
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * Set fairplay
     *
     * @param integer $fairplay
     * @return Classement
     */
    public function setFairplay($fairplay)
    {
        $this->fairplay = $fairplay;

        return $this;
    }

    /**
     * Get fairplay
     *
     * @return integer 
     */
    public function getFairplay()
    {
        return $this->fairplay;
    }

    /**
     * Set ambiance
     *
     * @param integer $ambiance
     * @return Classement
     */
    public function setAmbiance($ambiance)
    {
        $this->ambiance = $ambiance;

        return $this;
    }

    /**
     * Get ambiance
     *
     * @return integer 
     */
    public function getAmbiance()
    {
        return $this->ambiance;
    }

    /**
     * Set general
     *
     * @param integer $general
     * @return Classement
     */
    public function setGeneral($general)
    {
        $this->general = $general;

        return $this;
    }

    /**
     * Get general
     *
     * @return integer 
     */
    public function getGeneral()
    {
        return $this->general;
    }

    /**
     * Set nombreMatch
     *
     * @param integer $nombreMatch
     * @return Classement
     */
    public function setNombreMatch($nombreMatch)
    {
        $this->nombreMatch = $nombreMatch;

        return $this;
    }

    /**
     * Get nombreMatch
     *
     * @return integer 
     */
    public function getNombreMatch()
    {
        return $this->nombreMatch;
    }

    /**
     * Set victoire
     *
     * @param integer $victoire
     * @return Classement
     */
    public function setVictoire($victoire)
    {
        $this->victoire = $victoire;

        return $this;
    }

    /**
     * Get victoire
     *
     * @return integer 
     */
    public function getVictoire()
    {
        return $this->victoire;
    }

    /**
     * Set defaite
     *
     * @param integer $defaite
     * @return Classement
     */
    public function setDefaite($defaite)
    {
        $this->defaite = $defaite;

        return $this;
    }

    /**
     * Get defaite
     *
     * @return integer 
     */
    public function getDefaite()
    {
        return $this->defaite;
    }

    /**
     * Set derniereRencontre
     *
     * @param \DateTime $derniereRencontre
     * @return Classement
     */
    public function setDerniereRencontre($derniereRencontre)
    {
        $this->derniereRencontre = $derniereRencontre;

        return $this;
    }

    /**
     * Get derniereRencontre
     *
     * @return \DateTime 
     */
    public function getDerniereRencontre()
    {
        return $this->derniereRencontre;
    }

    /**
     * Set users
     *
     * @param \TC\TennisBundle\Entity\User $users
     * @return Classement
     */
    public function setUsers(\TC\TennisBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
