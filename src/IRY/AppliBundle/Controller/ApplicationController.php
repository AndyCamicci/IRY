<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IRY\AppliBundle\Entity\Helicopter;

class ApplicationController extends Controller
{
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager(); // On récupère l'Entity Manager
        $repo = $em->getRepository("IRYAppliBundle:Helicopter"); // On accède au Repository, qui possède les méthodes find(), findAll(), findBy() etc...
        $listeHelicopteres = $repo->findAll();

        return $this->render('IRYAppliBundle:Application:home.html.twig', array("helicopters" => $listeHelicopteres));
    }
    public function choixcoursAction(Helicopter $helicopter_id)
    {
        return $this->render('IRYAppliBundle:Application:choixcours.html.twig', array("helicopter" => $helicopter_id));
    }
}
