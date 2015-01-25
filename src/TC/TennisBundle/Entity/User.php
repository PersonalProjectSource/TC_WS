<?php

namespace TC\TennisBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
   
    
    /**
     * @ORM\OneToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id")
     */
    protected $adresses;
    
   /**
     * @ORM\OneToMany(targetEntity="Classement", mappedBy="users")
     */
    protected $classement;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    protected $messages;
    
   /**
     * @ORM\OneToOne(targetEntity="Statistique")
     */
    protected $statistique;
    
    /**
     * @ORM\OneToOne(targetEntity="Jugement", mappedBy="user")
     */
    protected $jugement;
    
    /**
     * @ORM\OneToMany(targetEntity="NewsStream", mappedBy="user")
     */
    protected $newsStreams;
    
   /**
     * @ORM\OneToOne(targetEntity="FriendList")
     */
    protected $FriendList;
    
   /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="isAdherent", type="boolean", length=255, nullable=true)
     */
    //private $isAdherent;
    
    
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
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        $this->username = $nom;
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        //parent::__construct();
        //$this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->auteurDefi = new \Doctrine\Common\Collections\ArrayCollection();
        $this->receveurDefi = new \Doctrine\Common\Collections\ArrayCollection();
        $this->auteurJugement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->receveurJugement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->defi = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add adresses
     *
     * @param \TC\TennisBundle\Entity\Adresse $adresses
     * @return User
     */
    public function addAdress(\TC\TennisBundle\Entity\Adresse $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \TC\TennisBundle\Entity\Adresse $adresses
     */
    public function removeAdress(\TC\TennisBundle\Entity\Adresse $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Set classement
     *
     * @param \TC\TennisBundle\Entity\Classement $classement
     * @return User
     */
    public function setClassement(\TC\TennisBundle\Entity\Classement $classement = null)
    {
        $this->classement = $classement;

        return $this;
    }

    /**
     * Get classement
     *
     * @return \TC\TennisBundle\Entity\Classement 
     */
    public function getClassement()
    {
        return $this->classement;
    }

    /**
     * Add auteurDefi
     *
     * @param \TC\TennisBundle\Entity\Defi $auteurDefi
     * @return User
     */
    public function addAuteurDefi(\TC\TennisBundle\Entity\Defi $auteurDefi)
    {
        $this->auteurDefi[] = $auteurDefi;

        return $this;
    }

    /**
     * Remove auteurDefi
     *
     * @param \TC\TennisBundle\Entity\Defi $auteurDefi
     */
    public function removeAuteurDefi(\TC\TennisBundle\Entity\Defi $auteurDefi)
    {
        $this->auteurDefi->removeElement($auteurDefi);
    }

    /**
     * Get auteurDefi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuteurDefi()
    {
        return $this->auteurDefi;
    }

    /**
     * Add receveurDefi
     *
     * @param \TC\TennisBundle\Entity\Defi $receveurDefi
     * @return User
     */
    public function addReceveurDefi(\TC\TennisBundle\Entity\Defi $receveurDefi)
    {
        $this->receveurDefi[] = $receveurDefi;

        return $this;
    }

    /**
     * Remove receveurDefi
     *
     * @param \TC\TennisBundle\Entity\Defi $receveurDefi
     */
    public function removeReceveurDefi(\TC\TennisBundle\Entity\Defi $receveurDefi)
    {
        $this->receveurDefi->removeElement($receveurDefi);
    }

    /**
     * Get receveurDefi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReceveurDefi()
    {
        return $this->receveurDefi;
    }

    /**
     * Add auteurJugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $auteurJugement
     * @return User
     */
    public function addAuteurJugement(\TC\TennisBundle\Entity\Jugement $auteurJugement)
    {
        $this->auteurJugement[] = $auteurJugement;

        return $this;
    }

    /**
     * Remove auteurJugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $auteurJugement
     */
    public function removeAuteurJugement(\TC\TennisBundle\Entity\Jugement $auteurJugement)
    {
        $this->auteurJugement->removeElement($auteurJugement);
    }

    /**
     * Get auteurJugement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuteurJugement()
    {
        return $this->auteurJugement;
    }

    /**
     * Add receveurJugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $receveurJugement
     * @return User
     */
    public function addReceveurJugement(\TC\TennisBundle\Entity\Jugement $receveurJugement)
    {
        $this->receveurJugement[] = $receveurJugement;

        return $this;
    }

    /**
     * Remove receveurJugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $receveurJugement
     */
    public function removeReceveurJugement(\TC\TennisBundle\Entity\Jugement $receveurJugement)
    {
        $this->receveurJugement->removeElement($receveurJugement);
    }

    /**
     * Get receveurJugement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReceveurJugement()
    {
        return $this->receveurJugement;
    }

    /**
     * Set statistique
     *
     * @param \TC\TennisBundle\Entity\Statistique $statistique
     * @return User
     */
    public function setStatistique(\TC\TennisBundle\Entity\Statistique $statistique = null)
    {
        $this->statistique = $statistique;

        return $this;
    }

    /**
     * Get statistique
     *
     * @return \TC\TennisBundle\Entity\Statistique 
     */
    public function getStatistique()
    {
        return $this->statistique;
    }

    /**
     * Set FriendList
     *
     * @param \TC\TennisBundle\Entity\FriendList $friendList
     * @return User
     */
    public function setFriendList(\TC\TennisBundle\Entity\FriendList $friendList = null)
    {
        $this->FriendList = $friendList;

        return $this;
    }

    /**
     * Get FriendList
     *
     * @return \TC\TennisBundle\Entity\FriendList 
     */
    public function getFriendList()
    {
        return $this->FriendList;
    }

    /**
     * Add defi
     *
     * @param \TC\TennisBundle\Entity\Defi $defi
     * @return User
     */
    public function addDefi(\TC\TennisBundle\Entity\Defi $defi)
    {
        $this->defi[] = $defi;

        return $this;
    }

    /**
     * Remove defi
     *
     * @param \TC\TennisBundle\Entity\Defi $defi
     */
    public function removeDefi(\TC\TennisBundle\Entity\Defi $defi)
    {
        $this->defi->removeElement($defi);
    }

    /**
     * Get defi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDefi()
    {
        return $this->defi;
    }

    /**
     * Add classement
     *
     * @param \TC\TennisBundle\Entity\Classement $classement
     * @return User
     */
    public function addClassement(\TC\TennisBundle\Entity\Classement $classement)
    {
        $this->classement[] = $classement;
    }
    
   /** Set isAdherent
     *
     * @param boolean $isAdherent
     * @return User
     */
    public function setIsAdherent($isAdherent)
    {
        $this->isAdherent = $isAdherent;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Remove classement
     *
     * @param \TC\TennisBundle\Entity\Classement $classement
     */
    public function removeClassement(\TC\TennisBundle\Entity\Classement $classement)
    {
        $this->classement->removeElement($classement);
    }

    /**
     * Add jugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $jugement
     * @return User
     */
    public function addJugement(\TC\TennisBundle\Entity\Jugement $jugement)
    {
        $this->jugement[] = $jugement;

        return $this;
    }

    /**
     * Remove jugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $jugement
     */
    public function removeJugement(\TC\TennisBundle\Entity\Jugement $jugement)
    {
        $this->jugement->removeElement($jugement);
    }

    /**
     * Get jugement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJugement()
    {
        return $this->jugement;
    }

    /**
     * Add newsStreams
     *
     * @param \TC\TennisBundle\Entity\NewsStream $newsStreams
     * @return User
     */
    public function addNewsStream(\TC\TennisBundle\Entity\NewsStream $newsStreams)
    {
        $this->newsStreams[] = $newsStreams;

        return $this;
    }

    /**
     * Remove newsStreams
     *
     * @param \TC\TennisBundle\Entity\NewsStream $newsStreams
     */
    public function removeNewsStream(\TC\TennisBundle\Entity\NewsStream $newsStreams)
    {
        $this->newsStreams->removeElement($newsStreams);
    }

    /**
     * Get newsStreams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNewsStreams()
    {
        return $this->newsStreams;
    }

    /**
     * Set jugement
     *
     * @param \TC\TennisBundle\Entity\Jugement $jugement
     * @return User
     */
    public function setJugement(\TC\TennisBundle\Entity\Jugement $jugement = null)
    {
        $this->jugement = $jugement;

        return $this;
    }
    
    

    /**
     * Set adresses
     *
     * @param \TC\TennisBundle\Entity\Adresse $adresses
     * @return User
     */
    public function setAdresses(\TC\TennisBundle\Entity\Adresse $adresses = null)
    {
        $this->adresses = $adresses;

        return $this;
    }

    /**
     * Add messages
     *
     * @param \TC\TennisBundle\Entity\Message $messages
     * @return User
     */
    public function addMessage(\TC\TennisBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \TC\TennisBundle\Entity\Message $messages
     */
    public function removeMessage(\TC\TennisBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
        
    }
    
   /** Get isAdherent
     *
     * @return boolean 
     */
    public function getIsAdherent()
    {
        return $this->isAdherent;
    }
}
