<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Course {
	private $id;
    private $name;
    /**
     * @var \IRY\AppliBundle\Entity\Theme
     */
    private $theme;


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
     * @return Course
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
     * Set theme
     *
     * @param \IRY\AppliBundle\Entity\Theme $theme
     * @return Course
     */
    public function setTheme(\IRY\AppliBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;
    
        return $this;
    }

    /**
     * Get theme
     *
     * @return \IRY\AppliBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
