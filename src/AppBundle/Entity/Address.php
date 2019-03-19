<?php

namespace AppBundle\Entity;

/**
 * Address
 */
class Address
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom;
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postal;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Address
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postal
     *
     * @param string $postal
     *
     * @return Address
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return string
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Address
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     *
     * @return Address
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $calendar3;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calendar3 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add calendar3
     *
     * @param \AppBundle\Entity\Calendar $calendar3
     *
     * @return Address
     */
    public function addCalendar3(\AppBundle\Entity\Calendar $calendar3)
    {
        $this->calendar3[] = $calendar3;

        return $this;
    }

    /**
     * Remove calendar3
     *
     * @param \AppBundle\Entity\Calendar $calendar3
     */
    public function removeCalendar3(\AppBundle\Entity\Calendar $calendar3)
    {
        $this->calendar3->removeElement($calendar3);
    }

    /**
     * Get calendar3
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalendar3()
    {
        return $this->calendar3;
    }
}
