<?php

namespace AppBundle\Entity;

/**
 * ClubCategory
 */
class ClubCategory
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->group . $this->categories . $this->club . $this->calendar1 . $this->calendar2;
    }


    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar2;

    /**
     * @var \AppBundle\Entity\Clubs
     */
    private $club;

    /**
     * @var \AppBundle\Entity\Categories
     */
    private $categories;

    /**
     * @var \AppBundle\Entity\Groups
     */
    private $group;

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
     * Add calendar1
     *
     * @param \AppBundle\Entity\Calendar $calendar1
     *
     * @return ClubCategory
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
     * @return ClubCategory
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

    /**
     * Set club
     *
     * @param \AppBundle\Entity\Clubs $club
     *
     * @return ClubCategory
     */
    public function setClub(\AppBundle\Entity\Clubs $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \AppBundle\Entity\Clubs
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set categories
     *
     * @param \AppBundle\Entity\Categories $categories
     *
     * @return ClubCategory
     */
    public function setCategories(\AppBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Groups $group
     *
     * @return ClubCategory
     */
    public function setGroup(\AppBundle\Entity\Groups $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\Groups
     */
    public function getGroup()
    {
        return $this->group;
    }
}
