<?php

namespace AppBundle\Entity;

/**
 * ClubCategory
 */
class ClubCategory
{
//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return $this->categories . $this->categories;
//    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $clubId;

    /**
     * @var integer
     */
    private $categoryId;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clubId
     *
     * @param integer $clubId
     *
     * @return ClubCategory
     */
    public function setClubId($clubId)
    {
        $this->clubId = $clubId;

        return $this;
    }

    /**
     * Get clubId
     *
     * @return integer
     */
    public function getClubId()
    {
        return $this->clubId;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return ClubCategory
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
