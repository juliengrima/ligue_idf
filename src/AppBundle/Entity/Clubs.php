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

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $clubName;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\ClubCategory $category
     *
     * @return Clubs
     */
    public function addCategory(\AppBundle\Entity\ClubCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\ClubCategory $category
     */
    public function removeCategory(\AppBundle\Entity\ClubCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
