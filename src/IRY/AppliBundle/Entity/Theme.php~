<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Theme {
    private $id;
    private $name;
    private $helicopter;
    private $subThemes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subThemes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add subThemes
     *
     * @param \IRY\AppliBundle\Entity\SubTheme $subThemes
     * @return Theme
     */
    public function addSubTheme(\IRY\AppliBundle\Entity\SubTheme $subThemes)
    {
        $this->subThemes[] = $subThemes;

        return $this;
    }

    /**
     * Remove subThemes
     *
     * @param \IRY\AppliBundle\Entity\SubTheme $subThemes
     */
    public function removeSubTheme(\IRY\AppliBundle\Entity\SubTheme $subThemes)
    {
        $this->subThemes->removeElement($subThemes);
    }

    /**
     * Get subThemes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubThemes()
    {
        return $this->subThemes;
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
