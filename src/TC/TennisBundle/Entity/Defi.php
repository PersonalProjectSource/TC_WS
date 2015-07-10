<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defi
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\DefiRepository")
 */
class Defi
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    protected $auteurDefi;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="receveur_id", referencedColumnName="id")
     */
    protected $receveurDefi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;


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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Defi
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Defi
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set auteurDefi
     *
     * @param \TC\TennisBundle\Entity\User $auteurDefi
     * @return Defi
     */
    public function setAuteurDefi(\TC\TennisBundle\Entity\User $auteurDefi = null)
    {
        $this->auteurDefi = $auteurDefi;

        return $this;
    }

    /**
     * Get auteurDefi
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getAuteurDefi()
    {
        return $this->auteurDefi;
    }

    /**
     * Set receveurDefi
     *
     * @param \TC\TennisBundle\Entity\User $receveurDefi
     * @return Defi
     */
    public function setReceveurDefi(\TC\TennisBundle\Entity\User $receveurDefi = null)
    {
        $this->receveurDefi = $receveurDefi;

        return $this;
    }

    /**
     * Get receveurDefi
     *
     * @return \TC\TennisBundle\Entity\User 
     */
    public function getReceveurDefi()
    {
        return $this->receveurDefi;
    }
}
