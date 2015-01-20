<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class TypeCourse {
    private $id;
    private $name;
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
     * @return TypeCourse
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
     * @return TypeCourse
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
}
