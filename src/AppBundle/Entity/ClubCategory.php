<?php

namespace AppBundle\Entity;

/**
 * ClubCategory
 */
class ClubCategory
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $clubId;

    /**
     * @var int
     */
    private $categoryId;


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
     * @return int
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
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    /**
     * @var \AppBundle\Entity\Clubs
     */
    private $club;


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
     * @var \AppBundle\Entity\Categories
     */
    private $categories;


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
     * @param \AppBundle\Entity\CategoryGroup $category
     *
     * @return ClubCategory
     */
    public function addCategory(\AppBundle\Entity\CategoryGroup $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\CategoryGroup $category
     */
    public function removeCategory(\AppBundle\Entity\CategoryGroup $category)
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
