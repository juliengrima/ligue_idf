<?php

namespace AppBundle\Entity;

/**
 * Clubs
 */
class Clubs
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $clubName;


    /**
     * Get id
     *
     * @return int
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Categories $category
     *
     * @return Clubs
     */
    public function addCategory(\AppBundle\Entity\Categories $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Categories $category
     */
    public function removeCategory(\AppBundle\Entity\Categories $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
