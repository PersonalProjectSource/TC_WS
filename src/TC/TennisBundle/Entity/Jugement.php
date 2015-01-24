<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\JugementRepository")
 */
class Jugement
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
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
       
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var Integer
     *
     * @ORM\Column(name="nombre_vote", type="integer")
     */
    private $nombreVote;
    
   /**
     * @var Integer
     *
     * @ORM\Column(name="fairplay", type="integer")
     */
    private $fairplay;

    /**
     * @var Integer
     *
     * @ORM\Column(name="technique", type="integer")
     */
    private $technique;
    
    /**
     * @var Integer
     *
     * @ORM\Column(name="ambiance", type="integer")
     */
    private $ambiance;
    
    /**
     * @var Integer
     *
     * @ORM\Column(name="general", type="integer")
     */
    private $general;




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
     * Set date
     *
     * @param \DateTime $date
     * @return Jugement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set fairplay
     *
     * @param integer $fairplay
     * @return Jugement
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
     * Set technique
     *
     * @param integer $technique
     * @return Jugement
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
     * Set ambiance
     *
     * @param integer $ambiance
     * @return Jugement
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
     * @return Jugement
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
     * Set auteurJugement
     *
     * @param \TC\TennisBundle\Entity\User $auteurJugement
     * @return Jugement
     */
    public function setAuteurJugement(\TC\TennisBundle\Entity\User $auteurJugement = null)
    {
        $this->auteurJugement = $auteurJugement;

        return $this;
    }

    /**
     * Get auteurJugement
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getAuteurJugement()
    {
        return $this->auteurJugement;
    }

    /**
     * Set receveurJugement
     *
     * @param \TC\TennisBundle\Entity\User $receveurJugement
     * @return Jugement
     */
    public function setReceveurJugement(\TC\TennisBundle\Entity\User $receveurJugement = null)
    {
        $this->receveurJugement = $receveurJugement;

        return $this;
    }

    /**
     * Get receveurJugement
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getReceveurJugement()
    {
        return $this->receveurJugement;
    }

    /**
     * Set nombreVote
     *
     * @param integer $nombreVote
     * @return Jugement
     */
    public function setNombreVote($nombreVote)
    {
        $this->nombreVote = $nombreVote;

        return $this;
    }

    /**
     * Get nombreVote
     *
     * @return integer 
     */
    public function getNombreVote()
    {
        return $this->nombreVote;
    }

    /**
     * Set user
     *
     * @param \TC\TennisBundle\Entity\User $user
     * @return Jugement
     */
    public function setUser(\TC\TennisBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
