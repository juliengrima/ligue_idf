<?php

namespace AppBundle\Entity;

/**
 * Groups
 */
class Groups
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->groupName;
    }


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $groupName;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set groupName
     *
     * @param string $groupName
     *
     * @return Groups
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\ClubCategory $category
     *
     * @return Groups
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
