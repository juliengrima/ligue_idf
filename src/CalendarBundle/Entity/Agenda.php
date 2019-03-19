<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\ClubCategory;
use AppBundle\Entity\Address;

/**
 * Agenda
 */

class Agenda
{
//    Set dateTime pour new event calendar
    public function __construct ()
    {
        $newTime = new \DateTime();
        $this->setStart($newTime);
        $this->setEnd($newTime);
    }

//    GENERATED CODE


    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var \AppBundle\Entity\ClubCategory
     */
    private $club1;

    /**
     * @var \AppBundle\Entity\ClubCategory
     */
    private $club2;

    /**
     * @var \AppBundle\Entity\Address
     */
    private $address;


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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Agenda
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Agenda
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set club1
     *
     * @param \AppBundle\Entity\ClubCategory $club1
     *
     * @return Agenda
     */
    public function setClub1(\AppBundle\Entity\ClubCategory $club1 = null)
    {
        $this->club1 = $club1;

        return $this;
    }

    /**
     * Get club1
     *
     * @return \AppBundle\Entity\ClubCategory
     */
    public function getClub1()
    {
        return $this->club1;
    }

    /**
     * Set club2
     *
     * @param \AppBundle\Entity\ClubCategory $club2
     *
     * @return Agenda
     */
    public function setClub2(\AppBundle\Entity\ClubCategory $club2 = null)
    {
        $this->club2 = $club2;

        return $this;
    }

    /**
     * Get club2
     *
     * @return \AppBundle\Entity\ClubCategory
     */
    public function getClub2()
    {
        return $this->club2;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Agenda
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
