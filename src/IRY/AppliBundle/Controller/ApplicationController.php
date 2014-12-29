<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\Step;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\Result;
use IRY\AppliBundle\Entity\Pilot;

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
    public function coursMagistralAction(Course $course_id)
    {
        //lancer diapo interactives
        return $this->render('IRYAppliBundle:Application:coursMagistral.html.twig', array("course" => $course_id));
    }
    public function coursDemonstratifAction(Course $course_id)
    {
        return $this->render('IRYAppliBundle:Application:coursDemonstratif.html.twig', array("course" => $course_id));
    }
    public function videoImmersiveAction(Course $course_id)
    {
        return $this->render('IRYAppliBundle:Application:videoImmersive.html.twig', array("course" => $course_id));
    }
    public function exercicePratiqueAction(Course $course_id)
    {
        // $em = $this->getDoctrine()->getManager();
        // $repo = $em->getRepository('IRYAppliBundle:Step');
        // $repo_results = $em->getRepository('IRYAppliBundle:Step');
        // $repo_results = $em->getRepository('IRYAppliBundle:Result');
        // $repo_pilots = $em->getRepository('IRYAppliBundle:Pilot');
        // $local_results = $repo_results->findBy(
        //     array('isGlobal' => '0')
        // );
        // $local_pilots = $repo_pilots->findBy(
        //     array('isGlobal' => '0')
        // );
        return $this->render('IRYAppliBundle:Application:exercicePratique.html.twig', array(
            // 'local_results' => $local_results, 
            "course" => $course_id
        ));
    }
    public function exercicePratiqueVuePiloteAction(Course $course_id, Pilot $pilot_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('IRYAppliBundle:Pilot');
        // $pilots = $repo->findAllSortedByCall();
        $pilots = $repo->findAll();

        return $this->render('IRYAppliBundle:Application:exercicePratiqueVuePilote.html.twig', array(
            'pilot' => $pilot_id, 
            "course" => $course_id
        ));
    }
    public function debriefingAction()
    {
        return $this->render('IRYAppliBundle:Application:debriefing.html.twig');
    }

    public function exercicePratiqueCentrePiloteAction(Course $course_id, Pilot $pilot_id)
    {
        return $this->render('IRYAppliBundle:Application:exercicePratiqueCentrePilote.html.twig', array(
            'pilot' => $pilot_id, 
            "course" => $course_id
        ));
    }
}