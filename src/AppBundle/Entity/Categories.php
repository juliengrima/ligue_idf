<?php

namespace AppBundle\Entity;

/**
 * Categories
 */
class Categories
{
//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return $this->categoryName;
//    }


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
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
