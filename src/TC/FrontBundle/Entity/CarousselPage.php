<?php

namespace TC\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarousselPage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\FrontBundle\Entity\CarousselPageRepository")
 */
class CarousselPage
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
     * @ORM\ManyToOne(targetEntity="WelcomeCarousel")
     * @ORM\JoinColumn(name="carousel_id", referencedColumnName="id")
     */
    protected $carousel;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subTitle", type="string", length=150)
     */
    private $subTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="buttonPath", type="string", length=255)
     */
    private $buttonPath;

    /**
     * @var string
     *
     * @ORM\Column(name="buttonLabel", type="string", length=255)
     */
    private $buttonLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
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
     * Set title
     *
     * @param string $title
     * @return CarousselPage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subTitle
     *
     * @param string $subTitle
     * @return CarousselPage
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string 
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return CarousselPage
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set buttonPath
     *
     * @param string $buttonPath
     * @return CarousselPage
     */
    public function setButtonPath($buttonPath)
    {
        $this->buttonPath = $buttonPath;

        return $this;
    }

    /**
     * Get buttonPath
     *
     * @return string 
     */
    public function getButtonPath()
    {
        return $this->buttonPath;
    }

    /**
     * Set buttonLabel
     *
     * @param string $buttonLabel
     * @return CarousselPage
     */
    public function setButtonLabel($buttonLabel)
    {
        $this->buttonLabel = $buttonLabel;

        return $this;
    }

    /**
     * Get buttonLabel
     *
     * @return string 
     */
    public function getButtonLabel()
    {
        return $this->buttonLabel;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CarousselPage
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
