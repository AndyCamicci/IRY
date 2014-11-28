<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Theme {
    private $id;
    private $name;
    private $helicopter;

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
     * Set helicopter
     *
     * @param \IRY\AppliBundle\Entity\Helicopter $helicopter
     * @return Theme
     */
    public function setHelicopter(\IRY\AppliBundle\Entity\Helicopter $helicopter = null)
    {
        $this->helicopter = $helicopter;

        return $this;
    }

    /**
     * Get helicopter
     *
     * @return \IRY\AppliBundle\Entity\Helicopter 
     */
    public function getHelicopter()
    {
        return $this->helicopter;
    }
}
