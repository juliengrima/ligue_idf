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
}
