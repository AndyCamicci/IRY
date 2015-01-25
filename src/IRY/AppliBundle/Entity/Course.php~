<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Course {
    private $id;
    private $name;
    private $steps;
    private $typeCourse;
    private $images;
    private $immersiveMovie;
    private $series;
    /**
     * @var \IRY\AppliBundle\Entity\SubTheme
     */
    private $subTheme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->steps = new \Doctrine\Common\Collections\ArrayCollection();
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
        $steps = $this->steps;
        
        // Order steps by order field
        $iterator = $steps->getIterator();
        $iterator->uasort(function ($a, $b) {

            // If the orders are identical, sort using theirs id's
            if ($a->getOrder() == $b->getOrder()) {
                return ($a->getId() < $b->getId()) ? -1 : 1;
            }

            return ($a->getOrder() < $b->getOrder()) ? -1 : 1;
        });

        $steps = new ArrayCollection(iterator_to_array($iterator));

        return $steps;
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


    public function getLastStep()
    {
        $higherStep = null;
        $higherStepOrder = null;

        foreach ($this->getSteps() as $key => $step) {
            if ($key == 0) {
                $higherStep = $step;
                $higherStepOrder = $step->getOrder();
            } else {

                if ($step->getOrder() >= $higherStepOrder) {
                    $higherStep = $step;
                    $higherStepOrder = $step->getOrder();
                }
            }
        }

        return $higherStep;

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
     * Set immersiveMovie
     *
     * @param \IRY\AppliBundle\Entity\ImmersiveMovie $immersiveMovie
     * @return Course
     */
    public function setImmersiveMovie(\IRY\AppliBundle\Entity\ImmersiveMovie $immersiveMovie = null)
    {
        $this->immersiveMovie = $immersiveMovie;

        return $this;
    }

    /**
     * Get immersiveMovie
     *
     * @return \IRY\AppliBundle\Entity\ImmersiveMovie 
     */
    public function getImmersiveMovie()
    {
        return $this->immersiveMovie;
    }
    public function getFullName()
    {
        return $this->getSubTheme()->getTheme()->getName().' > '.$this->getSubTheme()->getName().' > '.$this->getName();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */


    /**
     * Add series
     *
     * @param \IRY\AppliBundle\Entity\Serie $series
     * @return Course
     */
    public function addSeries(\IRY\AppliBundle\Entity\Serie $series)
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * Remove series
     *
     * @param \IRY\AppliBundle\Entity\Serie $series
     */
    public function removeSeries(\IRY\AppliBundle\Entity\Serie $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeries()
    {
        return $this->series;
    }
}
