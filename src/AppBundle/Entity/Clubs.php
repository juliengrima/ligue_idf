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
}
