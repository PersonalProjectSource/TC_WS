<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendList
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\FriendListRepository")
 */
class FriendList
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="derniereModification", type="datetime")
     */
    private $derniereModification;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * @return FriendList
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
     * Set derniereModification
     *
     * @param \DateTime $derniereModification
     * @return FriendList
     */
    public function setDerniereModification($derniereModification)
    {
        $this->derniereModification = $derniereModification;

        return $this;
    }

    /**
     * Get derniereModification
     *
     * @return \DateTime 
     */
    public function getDerniereModification()
    {
        return $this->derniereModification;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return FriendList
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return FriendList
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
