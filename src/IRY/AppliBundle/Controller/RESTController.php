<?php
namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use IRY\AppliBundle\Entity\Helicopter;

class RESTController extends Controller
{
    public function helicoptersAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$repo = $em->getRepository('IRYAppliBundle:Helicopter');
    	$helicopters = $repo->findAll();

    	$serializer = $this->get('jms_serializer');
		$data = $serializer->serialize($helicopters, 'json');

		$response = new JsonResponse();
		$response->setData($data);

		return $response;    	
    }

    public function helicopterAction(Helicopter $helicopter)
    {
    	$serializer = $this->get('jms_serializer');
		$data = $serializer->serialize($helicopter, 'json');
		
		$response = new JsonResponse();
		$response->setData($data);

		return $response; 
    }

    public function helicopterPostAction(Helicopter $helicopter)
    {
    	$serializer = $this->get('jms_serializer');
		$data = $serializer->serialize($helicopter, 'json');
		
		$response = new JsonResponse();
		$response->setData($data);

		return $response;
    }
}
