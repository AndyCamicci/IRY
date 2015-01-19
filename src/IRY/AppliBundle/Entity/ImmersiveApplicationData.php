<?php

/*

array (
  'downloadLink' => 'http://localhost:8000',
  'initialPosition' => '(0, 0, 0)',
  'initialRotation' => '(0, 0, 0, 0)',
  'initialScale' => '(0, 0, 0)',
  'filePath' => 'AS350/helicopter',
)



*/


namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class ImmersiveApplicationData {

    const TYPE_HELICOPTER = "Helicopter";
    const TYPE_OTHER = "Other";

    private $id;
    private $name;
    private $type;
	private $data;

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
     * @return ImmersiveApplicationData
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
     * Set data
     *
     * @param array $data
     * @return ImmersiveApplicationData
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return array 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ImmersiveApplicationData
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
