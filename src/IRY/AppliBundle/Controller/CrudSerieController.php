<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\Theme;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\Serie;
use IRY\AppliBundle\Form\Type\SerieType;
use IRY\AppliBundle\Entity\Image;
use IRY\AppliBundle\Form\Type\ImageType;
use IRY\AppliBundle\Entity\ImmersiveMovie;
use IRY\AppliBundle\Form\Type\ImmersiveMovieType;

class CrudSerieController extends Controller
{
    
    function seriesAction()
    {

        $serie = new Serie();
        $form = $this->createFormBuilder($serie)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($serie);
            $em->flush();
        }

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('IRYAppliBundle:Serie');
        $series = $repo->findAll();
        return $this->render('IRYAppliBundle:Crud:Serie/list.html.twig', array(
            'addSerieForm' => $form->createView(),
            'series' => $series
        ));
    }

    function deleteSerieAction(Serie $serie)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($serie);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_serie_list'));
    }

    function createSerieAction()
    {
        $serie = new Serie();
        $form = $this->processForm($serie);
        
        if ($form === true) {
            return $this->redirect($this->generateUrl('iry_crud_serie_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Serie/update.html.twig', array(
            'serieForm' => $form->createView(),
        ));
    }

    function updateSerieAction(Serie $serie)
    {
        $form = $this->processForm($serie);

        if ($form === true) {
            return $this->redirect($this->generateUrl('iry_crud_serie_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Serie/update.html.twig', array(
            'serieForm' => $form->createView(),
        ));
    }

    private function processForm(Serie $serie)
    {
        $form = $this->createForm(new SerieType(), $serie);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return true;
        }

        return $form;
    }

}
