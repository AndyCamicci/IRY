<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Course {
	private $id;
    private $name;
    private $steps;
    private $typeCourse;
    private $subTheme;
    private $images;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->steps = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add steps
     *
     * @param \IRY\AppliBundle\Entity\Step $steps
     * @return Course
     */
    public function addStep(\IRY\AppliBundle\Entity\Step $steps)
    {
        $this->steps[] = $steps;

        return $this;
    }

    /**
     * Remove steps
     *
     * @param \IRY\AppliBundle\Entity\Step $steps
     */
    public function removeStep(\IRY\AppliBundle\Entity\Step $steps)
    {
        $this->steps->removeElement($steps);
    }

    /**
     * Get steps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Add images
     *
     * @param \IRY\AppliBundle\Entity\Image $images
     * @return Course
     */
    public function addImage(\IRY\AppliBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \IRY\AppliBundle\Entity\Image $images
     */
    public function removeImage(\IRY\AppliBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set subTheme
     *
     * @param \IRY\AppliBundle\Entity\SubTheme $subTheme
     * @return Course
     */
    public function setSubTheme(\IRY\AppliBundle\Entity\SubTheme $subTheme = null)
    {
        $this->subTheme = $subTheme;

        return $this;
    }

    /**
     * Get subTheme
     *
     * @return \IRY\AppliBundle\Entity\SubTheme 
     */
    public function getSubTheme()
    {
        return $this->subTheme;
    }

    /**
     * Set typeCourse
     *
     * @param \IRY\AppliBundle\Entity\TypeCourse $typeCourse
     * @return Course
     */
    public function setTypeCourse(\IRY\AppliBundle\Entity\TypeCourse $typeCourse = null)
    {
        $this->typeCourse = $typeCourse;

        return $this;
    }

    /**
     * Get typeCourse
     *
     * @return \IRY\AppliBundle\Entity\TypeCourse 
     */
    public function getTypeCourse()
    {
        return $this->typeCourse;
    }
}
