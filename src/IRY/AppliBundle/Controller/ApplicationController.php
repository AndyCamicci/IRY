<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;

use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\Step;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\Result;
use IRY\AppliBundle\Entity\Pilot;
use IRY\AppliBundle\Entity\Serie;

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
    	//On récupère la première Serie pour l'instant, on la récupèrera ensuite en param.
    	$em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("IRYAppliBundle:Serie");
		$serie = $repo->find('1');
		//TO DELETE


        return $this->render('IRYAppliBundle:Application:choixcours.html.twig', array(
        	"helicopter" => $helicopter_id,
        	"serie" => $serie
        ));
    }
    public function coursMagistralAction(Course $course_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("IRYAppliBundle:Image"); // On accède au Repository, qui possède les méthodes find(), findAll(), findBy() etc...
        $images = $repo->findBy(
            array('course' => $course_id)
        );
        return $this->render('IRYAppliBundle:Application:coursMagistral.html.twig', array(
            "course" => $course_id,
            "images" => $images
        ));
    }
    public function coursDemonstratifAction(Course $course_id)
    {
        return $this->render('IRYAppliBundle:Application:coursDemonstratif.html.twig', array("course" => $course_id));
    }
    public function videoImmersiveAction(Course $course_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("IRYAppliBundle:Image"); // On accède au Repository, qui possède les méthodes find(), findAll(), findBy() etc...
        $images = $repo->findBy(
            array('course' => $course_id)
        );
        return $this->render('IRYAppliBundle:Application:videoImmersive.html.twig', array(
            "course" => $course_id,
            "images" => $images
        ));
    }
    public function exercicePratiqueAction(Course $course_id)
    {
        $em = $this->getDoctrine()->getManager();
        // $repo_results = $em->getRepository('IRYAppliBundle:Step');
        // $repo_results = $em->getRepository('IRYAppliBundle:Result');
        // $local_results = $repo_results->findBy(
        //     array('isGlobal' => '0')
        // );
        $repo_pilots = $em->getRepository('IRYAppliBundle:Pilot');
        $pilots = $repo_pilots->findAll();
        return $this->render('IRYAppliBundle:Application:exercicePratique.html.twig', array(
            "course" => $course_id,
            "pilots" => $pilots
        ));
    }
    public function exercicePratiqueVuePiloteAction(Course $course_id, Pilot $pilot_id)
    {
    	$em = $this->getDoctrine()->getManager();

        $repo_steps = $em->getRepository('IRYAppliBundle:Step');
        $steps = $repo_steps->findBy(array(
        	'course' => $course_id,
        ));

        $repo_results = $em->getRepository('IRYAppliBundle:Result');
        $results = $pilot_id->getResultsInCourse($course_id);
        $results_errors = new \Doctrine\Common\Collections\ArrayCollection();
        $results_success = new \Doctrine\Common\Collections\ArrayCollection();
        foreach ($results as $result => $value) {
        	if ($value->getIsError()) {
        		$results_errors[] = $value;
        	}
        	else{
        		$results_success[] = $value;        		
        	}
        }
        $lastStep = $course_id->getLastStep();
        return $this->render('IRYAppliBundle:Application:exercicePratiqueVuePilote.html.twig', array(
            'steps' => $steps, 
            'lastStep' => $lastStep, 
            'results' => $results, 
            'results_errors' => $results_errors, 
            'results_success' => $results_success, 
            'pilot' => $pilot_id, 
            "course" => $course_id
        ));
    }
    public function debriefingAction()
    {
        return $this->render('IRYAppliBundle:Application:debriefing.html.twig');
    }
}