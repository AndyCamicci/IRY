<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Pilot {
	private $id;
    private $name;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
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
     * @return Pilot
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
     * Add results
     *
     * @param \IRY\AppliBundle\Entity\Result $results
     * @return Pilot
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

    public function getNbErrors()
    {
        $errors = 0;
        foreach ($this->results as $result) {
            if ($result->getIsError() == true) {
                $errors++;
            }
        }

        return $errors;
    }
    public function getNbSuccess()
    {
        $success = 0;
        
        foreach ($this->results as $result) {
            if ($result->getStep()->isLastStep() == true && $result->getIsError() == false) {
                $success++;
            }
        }

        return $success;
    }
}
