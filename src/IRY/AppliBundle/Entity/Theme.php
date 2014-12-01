<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Theme {
    private $id;
    private $name;
    private $helicopter;
    private $courses;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add courses
     *
     * @param \IRY\AppliBundle\Entity\Course $courses
     * @return Theme
     */
    public function addCourse(\IRY\AppliBundle\Entity\Course $courses)
    {
        $this->courses[] = $courses;

        return $this;
    }

    /**
     * Remove courses
     *
     * @param \IRY\AppliBundle\Entity\Course $courses
     */
    public function removeCourse(\IRY\AppliBundle\Entity\Course $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
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
