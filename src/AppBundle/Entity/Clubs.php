<?php

namespace AppBundle\Entity;

/**
 * Clubs
 */
class Clubs
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->clubName;
    }

//    GENERATED CODE ------------------------------------>


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $clubName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar2;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calendar1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->calendar2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set clubName
     *
     * @param string $clubName
     *
     * @return Clubs
     */
    public function setClubName($clubName)
    {
        $this->clubName = $clubName;

        return $this;
    }

    /**
     * Get clubName
     *
     * @return string
     */
    public function getClubName()
    {
        return $this->clubName;
    }

    /**
     * Add calendar1
     *
     * @param \AppBundle\Entity\Calendar $calendar1
     *
     * @return Clubs
     */
    public function addCalendar1(\AppBundle\Entity\Calendar $calendar1)
    {
        $this->calendar1[] = $calendar1;

        return $this;
    }

    /**
     * Remove calendar1
     *
     * @param \AppBundle\Entity\Calendar $calendar1
     */
    public function removeCalendar1(\AppBundle\Entity\Calendar $calendar1)
    {
        $this->calendar1->removeElement($calendar1);
    }

    /**
     * Get calendar1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalendar1()
    {
        return $this->calendar1;
    }

    /**
     * Add calendar2
     *
     * @param \AppBundle\Entity\Calendar $calendar2
     *
     * @return Clubs
     */
    public function addCalendar2(\AppBundle\Entity\Calendar $calendar2)
    {
        $this->calendar2[] = $calendar2;

        return $this;
    }

    /**
     * Remove calendar2
     *
     * @param \AppBundle\Entity\Calendar $calendar2
     */
    public function removeCalendar2(\AppBundle\Entity\Calendar $calendar2)
    {
        $this->calendar2->removeElement($calendar2);
    }

    /**
     * Get calendar2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalendar2()
    {
        return $this->calendar2;
    }
}
