<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Course {
	private $id;
    private $name;
    private $steps;
    private $typeCourse;
    private $schemas;
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
        $higherStep;
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
     * Add schemas
     *
     * @param \IRY\AppliBundle\Entity\Schema $schemas
     * @return Course
     */
    public function addSchema(\IRY\AppliBundle\Entity\Schema $schemas)
    {
        $this->schemas[] = $schemas;

        return $this;
    }

    /**
     * Remove schemas
     *
     * @param \IRY\AppliBundle\Entity\Schema $schemas
     */
    public function removeSchema(\IRY\AppliBundle\Entity\Schema $schemas)
    {
        $this->schemas->removeElement($schemas);
    }

    /**
     * Get schemas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSchemas()
    {
        return $this->schemas;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schemaimages;


    /**
     * Add schemaimages
     *
     * @param \IRY\AppliBundle\Entity\SchemaImage $schemaimages
     * @return Course
     */
    public function addSchemaimage(\IRY\AppliBundle\Entity\SchemaImage $schemaimages)
    {
        $this->schemaimages[] = $schemaimages;

        return $this;
    }

    /**
     * Remove schemaimages
     *
     * @param \IRY\AppliBundle\Entity\SchemaImage $schemaimages
     */
    public function removeSchemaimage(\IRY\AppliBundle\Entity\SchemaImage $schemaimages)
    {
        $this->schemaimages->removeElement($schemaimages);
    }

    /**
     * Get schemaimages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSchemaimages()
    {
        return $this->schemaimages;
    }
}
