<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class ImmersiveMovie {
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
    protected $file;
    private $folder = "vi";

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
            $filename = $this->getFolder().'.'.$this->name;
            $this->path = $this->name.'.'.$this->file->guessExtension();
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

        $zip = new \ZipArchive;
        if ($zip->open($this->getAbsolutePath(), \ZipArchive::CREATE) === TRUE) {
            $toto=$zip->extractTo($this->getUploadRootDir().'/'.$this->name);
            $zip->close();
        } else {
            echo 'Problem';
        }
        unlink($this->getAbsolutePath());
        $this->file = null;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().$this->name;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir().$this->getFolder();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up.
        // when displaying uploaded doc/image in the view.
        return 'uploads/vi/';
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
