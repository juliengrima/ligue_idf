<?php

namespace AppBundle\Entity;

/**
 * Categories
 */
class Categories
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->categoryName;
    }

//    GENERATED CODE ------------------------------------>


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar4;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calendar4 = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return Categories
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Add calendar4
     *
     * @param \AppBundle\Entity\Calendar $calendar4
     *
     * @return Categories
     */
    public function addCalendar4(\AppBundle\Entity\Calendar $calendar4)
    {
        $this->calendar4[] = $calendar4;

        return $this;
    }

    /**
     * Remove calendar4
     *
     * @param \AppBundle\Entity\Calendar $calendar4
     */
    public function removeCalendar4(\AppBundle\Entity\Calendar $calendar4)
    {
        $this->calendar4->removeElement($calendar4);
    }

    /**
     * Get calendar4
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalendar4()
    {
        return $this->calendar4;
    }
}
