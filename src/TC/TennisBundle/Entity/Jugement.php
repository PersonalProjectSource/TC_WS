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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="defi")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    protected $auteurJugement;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="defi")
     * @ORM\JoinColumn(name="receveur_id", referencedColumnName="id")
     */
    protected $receveurJugement;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
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
}
