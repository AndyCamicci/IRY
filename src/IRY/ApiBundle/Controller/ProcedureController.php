<?php

namespace IRY\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;

use IRY\AppliBundle\Entity\Course;
// use IRY\AppliBundle\Form\Type\PilotType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ProcedureController extends Controller implements ClassResourceInterface
{
    /**
     * Get one procedure by giving it's id in parameter.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This API method returns one procedure.",
     * )
     * filters={
     *      {"name"="courseId", "dataType"="integer"},
     * }
     *
     * @param Course $course
     * @return array
     * @View()
     */
    public function getAction(Course $course)
    {
		return $course;
    }

}
