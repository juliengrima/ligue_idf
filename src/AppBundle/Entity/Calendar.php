<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Calendar
 */
class Calendar
{
    //    Set dateTime pour new event calendar
    public function __construct ()
    {
        $newTime = new \DateTime();
        $this->setStart($newTime);
        $this->setEnd($newTime);
    }

//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return $this->category;
//    }

//    GENERATED CODE ------------------------------------>


    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $scores;

    /**
     * @var \AppBundle\Entity\Clubs
     */
    private $club1;

    /**
     * @var \AppBundle\Entity\Clubs
     */
    private $club2;

    /**
     * @var \AppBundle\Entity\Categories
     */
    private $category;

    /**
     * @var \AppBundle\Entity\Address
     */
    private $address;


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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Calendar
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Calendar
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Calendar
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set scores
     *
     * @param string $scores
     *
     * @return Calendar
     */
    public function setScores($scores)
    {
        $this->scores = $scores;

        return $this;
    }

    /**
     * Get scores
     *
     * @return string
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Set club1
     *
     * @param \AppBundle\Entity\Clubs $club1
     *
     * @return Calendar
     */
    public function setClub1(\AppBundle\Entity\Clubs $club1 = null)
    {
        $this->club1 = $club1;

        return $this;
    }

    /**
     * Get club1
     *
     * @return \AppBundle\Entity\Clubs
     */
    public function getClub1()
    {
        return $this->club1;
    }

    /**
     * Set club2
     *
     * @param \AppBundle\Entity\Clubs $club2
     *
     * @return Calendar
     */
    public function setClub2(\AppBundle\Entity\Clubs $club2 = null)
    {
        $this->club2 = $club2;

        return $this;
    }

    /**
     * Get club2
     *
     * @return \AppBundle\Entity\Clubs
     */
    public function getClub2()
    {
        return $this->club2;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Categories $category
     *
     * @return Calendar
     */
    public function setCategory(\AppBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Calendar
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
