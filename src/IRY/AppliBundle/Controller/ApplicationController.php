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
        $serie = $this->getSerieCookie();

        $serie->setCommand("");
        $em = $this->getDoctrine()->getManager();
        $em->persist($serie);
        $em->flush();

        if (is_null($serie) == true) {
            $this->get('security.context')->setToken(null);
            $this->get('request')->getSession()->invalidate();
            return $this->redirect($this->generateUrl('login'));
        }
        return $this->render('IRYAppliBundle:Application:choixcours.html.twig', array(
        	"helicopter" => $helicopter_id,
        	"serie" => $serie
        ));
    }
    public function coursMagistralAction(Course $course_id)
    {
        $this->addCourseToSerie($course_id);
        
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
        $this->addCourseToSerie($course_id);
        $this->addCourseToInstructions($course_id);
        
        return $this->render('IRYAppliBundle:Application:coursDemonstratif.html.twig', array("course" => $course_id));
    }
    public function videoImmersiveAction(Course $course_id)
    {
        $this->addCourseToSerie($course_id);
        $this->addCourseToInstructions($course_id);
        
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
        $this->addCourseToSerie($course_id);
        $this->addCourseToInstructions($course_id);

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

    private function addCourseToSerie(Course $course) {
        $serie = $this->getSerieCookie();

        if (is_null($serie) == false) {
            $serie->addCourseIfNotExists($course);

            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();
        }

    }

    private function getSerieCookie() {
        $request = $this->get('request');
        $cookies = $request->cookies;

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("IRYAppliBundle:Serie");

        if ($cookies->has('serie')) {
            $serieCookie = $cookies->get('serie');
        } else {
            $serieCookie = 0;
        }

        $serie = $repo->find($serieCookie);

        return $serie;
    }

    private function addCourseToInstructions(Course $course) {
        $serie = $this->getSerieCookie();

        if (is_null($serie) == false) {
            switch ($course->getTypeCourse()->getId()) {
                case 2: // Demonstrative course
                    $serie->setCommand(Serie::COMMAND_STARTDEMONSTRATIVECOURSE . " " . $course->getId());
                    break;
                case 3: // Immersive movie
                    $serie->setCommand(Serie::COMMAND_STARTIMMERSIVEMOVIE . " " . $course->getId());
                    break;
                case 4: // Practical training
                    $serie->setCommand(Serie::COMMAND_STARTPRACTICALTRAINING . " " . $course->getId());
                    break;
                default:
                    $serie->setCommand("");
                    break;
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();
        }
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
    public function debriefingAction(Course $course_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo_pilots = $em->getRepository('IRYAppliBundle:Pilot');
        $pilots = $repo_pilots->findAll();

        $repo_results = $em->getRepository('IRYAppliBundle:Result');
        $results = $repo_results->findAll();
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
        return $this->render('IRYAppliBundle:Application:debriefing.html.twig', array(
            'results' => $results, 
            'results_errors' => $results_errors, 
            'results_success' => $results_success, 
            "course" => $course_id,
            "pilots" => $pilots
        )); 
    }
    public function crudAction()
    {
        return $this->render('IRYAppliBundle:Crud:crud.html.twig'); 
    }
}