<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\Theme;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\Image;
use IRY\AppliBundle\Form\Type\ImageType;
use IRY\AppliBundle\Entity\ImmersiveMovie;
use IRY\AppliBundle\Form\Type\ImmersiveMovieType;
use IRY\AppliBundle\Form\Type\HelicopterType;

class CrudHelicopterController extends Controller
{
    
    function helicoptersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('IRYAppliBundle:Helicopter');
        $helicopters = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Helicopter/list.html.twig', array(
            'helicopters' => $helicopters,
        ));
    }

    function deleteHelicopterAction(Helicopter $helicopter)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($helicopter);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_heli_list'));
    }

    function createHelicopterAction()
    {
        $helicopter = new Helicopter();
        $form = $this->processForm($helicopter);
        
        if ($form === true) {
            return $this->redirect($this->generateUrl('iry_crud_heli_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Helicopter/form.html.twig', array(
            'helicopterForm' => $form->createView(),
        ));
    }

    function updateHelicopterAction(Helicopter $helicopter)
    {
        $form = $this->processForm($helicopter);

        if ($form === true) {
            return $this->redirect($this->generateUrl('iry_crud_heli_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Helicopter/form.html.twig', array(
            'helicopterForm' => $form->createView(),
        ));
    }

    private function processForm(Helicopter $helicopter)
    {
        $form = $this->createForm(new HelicopterType(), $helicopter);
        // $form->bind($this->getRequest());
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($helicopter);
            $em->flush();

            return true;
        }

        return $form;
    }

}
