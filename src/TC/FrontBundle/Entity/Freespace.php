<?php

namespace TC\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Freespace
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\FrontBundle\Entity\FreespaceRepository")
 */
class Freespace
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
     * @ORM\OneToOne(targetEntity="WelcomeCarousel")
     */
    protected $carousel;

    /**
     * @var string
     *
     * @ORM\Column(name="header_prefix", type="string", length=50)
     */
    private $headerPrefix;

    /**
     * @var string
     *
     * @ORM\Column(name="header_suffix", type="string", length=50)
     */
    private $headerSuffix;

    /**
     * @var string
     *
     * @ORM\Column(name="Welcome_title", type="string", length=150)
     */
    private $welcomeTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="welcom_subTitle", type="string", length=150)
     */
    private $welcomeSubTitle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="big_bandeau", type="string", length=150)
     */
    private $bigBandeau;
    
    /**
     * @var string
     *
     * @ORM\Column(name="picto_1", type="string", length=150)
     */
    private $picto1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="picto_2", type="string", length=150)
     */
    private $picto2;
    
    /**
     * @var string
     *
     * @ORM\Column(name="picto_3", type="string", length=150)
     */
    private $picto3;
    
    /**
     * @var string
     *
     * @ORM\Column(name="content_1", type="string", length=150)
     */
    private $content1;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="content_2", type="string", length=150)
     */
    private $content2;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="content_3", type="string", length=150)
     */
    private $content3;
    
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
     * Set headerPrefix
     *
     * @param string $headerPrefix
     * @return Freespace
     */
    public function setHeaderPrefix($headerPrefix)
    {
        $this->headerPrefix = $headerPrefix;

        return $this;
    }

    /**
     * Get headerPrefix
     *
     * @return string 
     */
    public function getHeaderPrefix()
    {
        return $this->headerPrefix;
    }

    /**
     * Set headerSuffix
     *
     * @param string $headerSuffix
     * @return Freespace
     */
    public function setHeaderSuffix($headerSuffix)
    {
        $this->headerSuffix = $headerSuffix;

        return $this;
    }

    /**
     * Get headerSuffix
     *
     * @return string 
     */
    public function getHeaderSuffix()
    {
        return $this->headerSuffix;
    }

    /**
     * Set welcomeTitle
     *
     * @param string $welcomeTitle
     * @return Freespace
     */
    public function setWelcomeTitle($welcomeTitle)
    {
        $this->welcomeTitle = $welcomeTitle;

        return $this;
    }

    /**
     * Get welcomeTitle
     *
     * @return string 
     */
    public function getWelcomeTitle()
    {
        return $this->welcomeTitle;
    }

    /**
     * Set welcomeSubTitle
     *
     * @param string $welcomeSubTitle
     * @return Freespace
     */
    public function setWelcomeSubTitle($welcomeSubTitle)
    {
        $this->welcomeSubTitle = $welcomeSubTitle;

        return $this;
    }

    /**
     * Get welcomeSubTitle
     *
     * @return string 
     */
    public function getWelcomeSubTitle()
    {
        return $this->welcomeSubTitle;
    }
}
