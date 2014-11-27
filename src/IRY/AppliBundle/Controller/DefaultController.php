<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IRY\AppliBundle\Entity\Helicopter;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$list = array();

    	$em = $this->getDoctrine()->getManager();

    	/*for ($i=0; $i < 10; $i++) { 
    		$heli = new Helicopter();
    		$heli->setName('AS350 ' . $i);
	    	
	    	$em->persist($heli);
    	}
        $em->flush();*/
    	
        $list = $em->getRepository("IRYAppliBundle:Helicopter")->findOneBy(array("name" => "AS350"));

    	var_dump($list);
    	exit();
        // return $this->render('IRYAppliBundle:Default:index.html.twig', array('list' => $list));
    }

    public function testAction()
    {
    	echo "coucou";
        exit();
    }
}
