<?php

namespace IRY\AppliBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use IRY\AppliBundle\Entity\SubTheme;
use IRY\AppliBundle\Entity\Theme;

class Serie {
    private $id;
    private $name;
	private $helicopter;
    private $courses;
    /* Used to communicate with Immersive Application */
    private $command;

    const COMMAND_STARTPRACTICALTRAINING = "STARTPRACTICALTRAINING";
    const COMMAND_STARTDEMONSTRATIVECOURSE = "STARTDEMONSTRATIVECOURSE";
    const COMMAND_STARTIMMERSIVEMOVIE = "STARTIMMERSIVEMOVIE";
    const COMMAND_SHOWBTN = "COMMAND_SHOWBTN";
    const COMMAND_GOTO_WAITING = "COMMAND_GOTO_WAITING";
    const COMMAND_SHOWIMAGE = "COMMAND_SHOWIMAGE";

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add courses
     *
     * @param \IRY\AppliBundle\Entity\Course $courses
     * @return Serie
     */
    public function addCourse(\IRY\AppliBundle\Entity\Course $courses)
    {
        $this->courses[] = $courses;

        return $this;
    }

    /**
     * Remove courses
     *
     * @param \IRY\AppliBundle\Entity\Course $courses
     */
    public function removeCourse(\IRY\AppliBundle\Entity\Course $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Serie
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
     * Set helicopter
     *
     * @param \IRY\AppliBundle\Entity\Helicopter $helicopter
     * @return Serie
     */
    public function setHelicopter(\IRY\AppliBundle\Entity\Helicopter $helicopter = null)
    {
        $this->helicopter = $helicopter;

        return $this;
    }

    /**
     * Get helicopter
     *
     * @return \IRY\AppliBundle\Entity\Helicopter 
     */
    public function getHelicopter()
    {
        return $this->helicopter;
    }
    public function hasCourse(Course $course_id)
    {
        foreach ($this->getCourses() as $course) {
            if ($course->getId() == $course_id->getId()) {
                return true;
            }
        }
        return false;
    }
    public function hasAllCoursesOfSubTheme(SubTheme $subTheme)
    {
        foreach ($subTheme->getCourses() as $courseOfSubTheme) {
            if ($this->getCourses()->contains($courseOfSubTheme) == false) {
                return false;
            }
        }
        return true;
    }
    public function hasAllCoursesOfTheme(Theme $theme)
    {
        foreach ($theme->getSubThemes() as $subTheme) {
            if ($this->hasAllCoursesOfSubTheme($subTheme) == false) {
                return false;
            }
        }
        return true;
    }
    public function addCourseIfNotExists(\IRY\AppliBundle\Entity\Course $course)
    {
        if ($this->courses->contains($course) == false) {
            $this->courses[] = $course;
        }

        return $this;
    }

    /**
     * Set command
     *
     * @param string $command
     * @return Serie
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string 
     */
    public function getCommand()
    {
        return $this->command;
    }
}
