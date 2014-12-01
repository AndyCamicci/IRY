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
}
