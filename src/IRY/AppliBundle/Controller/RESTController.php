<?php
namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use IRY\AppliBundle\Entity\Result;
use IRY\AppliBundle\Entity\Serie;
use IRY\AppliBundle\Entity\Course;

class RESTController extends Controller
{
    public function setResultToFavoriteAction(Result $result)
    {
    	$em = $this->getDoctrine()->getManager();

        $result->setIsFavorite(!$result->getIsFavorite());

        $em->persist($result);
        $em->flush();

		$response = new JsonResponse();
		$response->setData(array("success" => true, "favorite" => $result->getIsFavorite()));

		return $response;
    }

    public function getLastInstructionAction(Serie $serie)
    {
        $response = new JsonResponse();
        $response->setData(array("instruction" => $serie->getCommand()));

        return $response;
    }
    public function getCourseInstructionsAction(Course $course)
    {
        $response = new JsonResponse();
        $data = array();

        switch ($course->getTypeCourse()->getName()) {
            case "Demonstrative Course":
                break;
            case "Immersive Movie":
                break;
            case "Practical Training":
                return $this->redirect($this->generateUrl('get_procedure', array(
                    'course' => $course->getId(),
                    '_format' => 'json'
                    )));
                break;
        }

        $response->setData($data);
        return $response;
    }

}
