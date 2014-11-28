<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IRY\AppliBundle\Entity\Helicopter;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	/*for ($i=0; $i < 10; $i++) { 
    		$heli = new Helicopter();
    		$heli->setName('AS350 ' . $i);
	    	
	    	$em->persist($heli);
    	}
        $em->flush();*/

        return $this->render('IRYAppliBundle:Default:index.html.twig');
    }

    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager(); // On récupère l'Entity Manager
        $repo = $em->getRepository("IRYAppliBundle:Helicopter"); // On accède au Repository, qui possède les méthodes find(), findAll(), findBy() etc...
        $listeHelicopteres = $repo->findAll();
        
        return $this->render('IRYAppliBundle:Default:home.html.twig', array("data" => $listeHelicopteres));
    }
}
