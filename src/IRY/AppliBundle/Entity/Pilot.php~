<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Pilot {
	private $id;
    private $name;
    private $isCalling;
    private $dateCalling;
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
        foreach ($this->getResults() as $result) {
            if ($result->getIsError() == true) {
                $errors++;
            }
        }

        return $errors;
    }
    public function getNbSuccess()
    {
        $success = 0;
        
        foreach ($this->getResults() as $result) {
            if ($result->getIsGlobal() == false && $result->getStep()->isLastStep() == true && $result->getIsError() == false) {
                $success++;
            }
        }

        return $success;
    }

    public function getCurrentStep()
    {
        $results = $this->getResults();
        echo count($results);
        die();
        if (count($results) > 0) {
            $lastResult = $results[count($results) - 1];
            $lastStep = $lastResult->getStep();

            return $lastStep->getNextStep();
        }

        return null;
    }

    /**
     * Set isCalling
     *
     * @param boolean $isCalling
     * @return Pilot
     */
    public function setIsCalling($isCalling = false)
    {
        $this->isCalling = $isCalling;

        return $this;
    }

    /**
     * Get isCalling
     *
     * @return boolean 
     */
    public function getIsCalling()
    {
        return $this->isCalling;
    }

    /**
     * Set dateCalling
     *
     * @param \DateTime $dateCalling
     * @return Pilot
     */
    public function setDateCalling($dateCalling)
    {
        $this->dateCalling = $dateCalling;

        return $this;
    }

    /**
     * Get dateCalling
     *
     * @return \DateTime 
     */
    public function getDateCalling()
    {
        return $this->dateCalling;
    }
    public function getJavascriptTimestampDateCalling()
    {
        if (is_null($this->getDateCalling()) == false) {
            return $this->dateCalling->getTimestamp() * 1000; // Because PHP counts the numbers of seconds, and JS the milliseconds
        }
        return 0;
    }
}
