<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Result {
    private $id;
    private $pilot;
    private $step;
    private $error = 0;
    private $trial;
    private $isFavorite;
    const TYPE_LOCAL = "Local";
    const TYPE_GLOBAL = "Global";
    private $state;

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
     * Set error
     *
     * @param integer $error
     * @return Result
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get error
     *
     * @return integer 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set isFavorite
     *
     * @param boolean $isFavorite
     * @return Result
     */
    public function setIsFavorite($isFavorite)
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    /**
     * Get isFavorite
     *
     * @return boolean 
     */
    public function getIsFavorite()
    {
        return $this->isFavorite;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Result
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set trial
     *
     * @param \IRY\AppliBundle\Entity\Trial $trial
     * @return Result
     */
    public function setTrial(\IRY\AppliBundle\Entity\Trial $trial = null)
    {
        $this->trial = $trial;

        return $this;
    }

    /**
     * Get trial
     *
     * @return \IRY\AppliBundle\Entity\Trial 
     */
    public function getTrial()
    {
        return $this->trial;
    }

    /**
     * Set pilot
     *
     * @param \IRY\AppliBundle\Entity\Pilot $pilot
     * @return Result
     */
    public function setPilot(\IRY\AppliBundle\Entity\Pilot $pilot = null)
    {
        $this->pilot = $pilot;

        return $this;
    }

    /**
     * Get pilot
     *
     * @return \IRY\AppliBundle\Entity\Pilot 
     */
    public function getPilot()
    {
        return $this->pilot;
    }

    /**
     * Set step
     *
     * @param \IRY\AppliBundle\Entity\Step $step
     * @return Result
     */
    public function setStep(\IRY\AppliBundle\Entity\Step $step = null)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return \IRY\AppliBundle\Entity\Step 
     */
    public function getStep()
    {
        return $this->step;
    }
}
