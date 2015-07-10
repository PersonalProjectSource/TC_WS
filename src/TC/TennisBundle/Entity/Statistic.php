<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use TC\TennisBundle\Entity\User;
use TC\TennisBundle\Entity\Statistique;


/**
 * Statistic_user
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Statistic
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="statLinkU", cascade="persist")
     */
    protected $users;

    /**
     * @ORM\ManyToOne(targetEntity="Statistique", inversedBy="statLinkS", cascade="persist")
     */
    protected $stats;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;


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
     * @param string $date
     * @return Statistic_user
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
     * Set statistiques
     *
     * @param \TC\TennisBundle\Entity\Statistique $statistiques
     * @return Statistic_user
     */
    public function setStatistiques(\TC\TennisBundle\Entity\Statistique $statistiques = null)
    {
        $this->statistiques = $statistiques;

        return $this;
    }

    /**
     * Get statistiques
     *
     * @return \TC\TennisBundle\Entity\Statistique 
     */
    public function getStatistiques()
    {
        return $this->statistiques;
    }

    /**
     * Set users
     *
     * @param \TC\TennisBundle\Entity\User $users
     * @return Statistic_user
     */
    public function setUsers(\TC\TennisBundle\Entity\User $users = null)
    {
        $users->addStatLinkU($this);
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

    /**
     * Set stats
     *
     * @param \TC\TennisBundle\Entity\Statistique $stats
     * @return Statistic
     */
    public function setStats(\TC\TennisBundle\Entity\Statistique $stats = null)
    {
        $stats->addUserStatistic($this);
        $this->stats = $stats;

        return $this;
    }

    /**
     * Get stats
     *
     * @return \TC\TennisBundle\Entity\Statistique 
     */
    public function getStats()
    {
        return $this->stats;
    }
}
