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
     * @var string
     */
    private $btn_name;

    /**
     * @var boolean
     */
    private $btn_state;

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


    /**
     * Set btn_name
     *
     * @param string $btnName
     * @return Step
     */
    public function setBtnName($btnName)
    {
        $this->btn_name = $btnName;

        return $this;
    }

    /**
     * Get btn_name
     *
     * @return string 
     */
    public function getBtnName()
    {
        return $this->btn_name;
    }

    /**
     * Set btn_state
     *
     * @param boolean $btnState
     * @return Step
     */
    public function setBtnState($btnState)
    {
        $this->btn_state = $btnState;

        return $this;
    }

    /**
     * Get btn_state
     *
     * @return boolean 
     */
    public function getBtnState()
    {
        return $this->btn_state;
    }

    public function isLastStep()
    {
        $lastStep = $this->course->getLastStep();

        if (is_null($lastStep) == false) {
            
            return $lastStep->getId() == $this->getId();
        }

        return false;
    }
}
