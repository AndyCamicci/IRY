<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

  /**
     * @var \IRY\AppliBundle\Entity\Step
     */
class Step {
	private $id;
    private $name;
    private $course;
    private $order;
    private $results;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Step
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
     * Set order
     *
     * @param integer $order
     * @return Step
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Add results
     *
     * @param \IRY\AppliBundle\Entity\Result $results
     * @return Step
     */
    public function addResult(\IRY\AppliBundle\Entity\Result $results)
    {
        $this->results[] = $results;

        return $this;
    }

    /**
     * Remove results
     *
     * @param \IRY\AppliBundle\Entity\Result $results
     */
    public function removeResult(\IRY\AppliBundle\Entity\Result $results)
    {
        $this->results->removeElement($results);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Set course
     *
     * @param \IRY\AppliBundle\Entity\Course $course
     * @return Step
     */
    public function setCourse(\IRY\AppliBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \IRY\AppliBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    // public function getNbEssai()
    // {
    //     $nbEssai = 0;
    //     $i = 0;
    //     for ($i;$this->isError;$i++)
    //     {
    //         $nbEssai = $nbEssai +1;
    //     }
    //     return $this->nbEssai;
    // }

    public function getNbErrors()
    {
        $nbErrors = 0;

        for ($i=0; $i < count($this->results); $i++) { 
            if ($this->results[$i]->getIsError() == true) {
                $nbErrors++;
            }
        }
             
        return $nbErrors;
    }
}
