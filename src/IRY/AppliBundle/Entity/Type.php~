<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Type {
	private $id;
    private $name;

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
     * Set name
     *
     * @param string $name
     * @return Theme
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Helicopter;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Helicopter = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Helicopter
     *
     * @param \IRY\AppliBundle\Entity\Course $helicopter
     * @return Type
     */
    public function addHelicopter(\IRY\AppliBundle\Entity\Course $helicopter)
    {
        $this->Helicopter[] = $helicopter;

        return $this;
    }

    /**
     * Remove Helicopter
     *
     * @param \IRY\AppliBundle\Entity\Course $helicopter
     */
    public function removeHelicopter(\IRY\AppliBundle\Entity\Course $helicopter)
    {
        $this->Helicopter->removeElement($helicopter);
    }

    /**
     * Get Helicopter
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHelicopter()
    {
        return $this->Helicopter;
    }
}
