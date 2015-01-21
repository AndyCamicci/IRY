<?php
namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use IRY\AppliBundle\Entity\Result;

class RESTController extends Controller
{
    public function setResultToFavoriteAction(Result $result)
    {
    	$em = $this->getDoctrine()->getManager();

        $result->setIsFavorite(true);

        $em->persist($result);
        $em->flush();

    	$serializer = $this->get('jms_serializer');
		$data = $serializer->serialize($helicopters, 'json');

		$response = new JsonResponse();
		$response->setData($result);

		return $response;
    }

}
