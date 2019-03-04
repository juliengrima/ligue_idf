<?php

namespace AppBundle\Entity;

/**
 * Categories
 */
class Categories
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $categoryName;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $clubs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clubs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add club
     *
     * @param \AppBundle\Entity\Clubs $club
     *
     * @return Categories
     */
    public function addClub(\AppBundle\Entity\Clubs $club)
    {
        $this->clubs[] = $club;

        return $this;
    }

    /**
     * Remove club
     *
     * @param \AppBundle\Entity\Clubs $club
     */
    public function removeClub(\AppBundle\Entity\Clubs $club)
    {
        $this->clubs->removeElement($club);
    }

    /**
     * Get clubs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClubs()
    {
        return $this->clubs;
    }

    /**
     * Add group
     *
     * @param \AppBundle\Entity\Groups $group
     *
     * @return Categories
     */
    public function addGroup(\AppBundle\Entity\Groups $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\Groups $group
     */
    public function removeGroup(\AppBundle\Entity\Groups $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
