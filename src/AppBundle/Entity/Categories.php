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
     * Add category
     *
     * @param \AppBundle\Entity\ClubCategory $category
     *
     * @return Categories
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
