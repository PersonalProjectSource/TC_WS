<?php

namespace TC\TennisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsStream
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\TennisBundle\Entity\Repositories\NewsStreamRepository")
 */
class NewsStream
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="newsStreams")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeColor", type="string", length=20)
     */
    private $typeColor;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="string", length=255)
     */
    private $content;


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
     * @return NewsStream
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
     * Set date
     *
     * @param \DateTime $date
     * @return NewsStream
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
     * Set typeColor
     *
     * @param string $typeColor
     * @return NewsStream
     */
    public function setTypeColor($typeColor)
    {
        $this->typeColor = $typeColor;

        return $this;
    }

    /**
     * Get typeColor
     *
     * @return string 
     */
    public function getTypeColor()
    {
        return $this->typeColor;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return NewsStream
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
}
