<?php

namespace TC\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use TC\FrontBundle\Entity\CarouselImage;
  

/**
 * WelcomeCarousel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TC\FrontBundle\Entity\WelcomeCarouselRepository")
 */
class WelcomeCarousel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @ORM\OneToMany(targetEntity="CarouselImage", mappedBy="carousel")
//     */
//    protected $images;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=150)
     */
    private $size;

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
     * @return WelcomeCarousel
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
}
