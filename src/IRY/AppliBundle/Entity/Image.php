<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Image {
    private $id;
    private $course;
    private $path;
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $theOrder = 1;
    protected $file;
    private $folder;
    const IMAGE_CM = "cm";
    const IMAGE_SCHEMA = "schema";

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
     * Set img
     *
     * @param string $img
     * @return Schema
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }


     /**
     * Set course
     *
     * @param string $course
     * @return Schema
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string 
     */
    public function getCourse()
    {
        return $this->course;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Image
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
     * Set theOrder
     *
     * @param integer $theOrder
     * @return Image
     */
    public function setTheOrder($theOrder)
    {
        $this->theOrder = $theOrder;

        return $this;
    }

    /**
     * Get theOrder
     *
     * @return integer 
     */
    public function getTheOrder()
    {
        return $this->theOrder;
    }
    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
    public function preUpload()
    {   
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $filename = $this->getFolder() . "/" . sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->file->guessExtension();
        }
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            if (file_exists($file)) {
                unlink($file); 
            }
        }
    }

    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->file->move(
            $this->getUploadRootDir(),
            $this->path
        );

        // Set the path property to the filename where you've saved the file
        //$this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->file = null;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        $reflClass = new \ReflectionClass(get_class($this));
        
        return dirname($reflClass->getFileName()).'/../../../../web/'.$this->getUploadDir().$this->getFolder();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up.
        // when displaying uploaded doc/image in the view.
        return 'uploads/';
    }

    public function setFolder($folder)
    {
        $this->folder = $folder;

        return $this;
    }
    public function getFolder()
    {
        return $this->folder;
    }
}
