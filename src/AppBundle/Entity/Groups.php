<?php

namespace AppBundle\Entity;

/**
 * Groups
 */
class Groups
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $groupName;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add group
     *
     * @param \AppBundle\Entity\CategoryGroup $group
     *
     * @return Groups
     */
    public function addGroup(\AppBundle\Entity\CategoryGroup $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\CategoryGroup $group
     */
    public function removeGroup(\AppBundle\Entity\CategoryGroup $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroup()
    {
        return $this->group;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category;


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
