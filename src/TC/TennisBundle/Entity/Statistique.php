<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\StatistiqueRepository")
 */
class Statistique
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
     * @ORM\OneToMany(targetEntity="Statistic", mappedBy="stats")
     */
    protected $statLinkS;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;


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
     * Set titre
     *
     * @param string $titre
     * @return Statistique
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Statistique
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Statistique
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_statistic = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user_statistic
     *
     * @param \TC\TennisBundle\Entity\Statistique $userStatistic
     * @return Statistique
     */
    public function addUserStatistic(\TC\TennisBundle\Entity\Statistic $userStatistic)
    {
        $this->user_statistic[] = $userStatistic;

        return $this;
    }

    /**
     * Remove user_statistic
     *
     * @param \TC\TennisBundle\Entity\Statistique $userStatistic
     */
    public function removeUserStatistic(\TC\TennisBundle\Entity\Statistique $userStatistic)
    {
        $this->user_statistic->removeElement($userStatistic);
    }

    /**
     * Get user_statistic
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserStatistic()
    {
        return $this->user_statistic;
    }
}
