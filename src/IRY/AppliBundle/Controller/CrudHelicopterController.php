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

class CrudHelicopterController extends Controller
{
    
    function helicoptersAction()
    {
        $helicopter = new Helicopter();
        $form = $this->createFormBuilder($helicopter)
            ->add('name', 'text')
            ->add('type', 'choice', array(
                'choices'   => array(
                    Helicopter::TYPE_MILITARY => Helicopter::TYPE_MILITARY, 
                    Helicopter::TYPE_CIVIL => Helicopter::TYPE_CIVIL
                ),
            ))
            ->add('save', 'submit')
            ->getForm();
        
        $request = $this->getRequest();
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($helicopter);
            $em->flush();
        }

        $repo = $em->getRepository('IRYAppliBundle:Helicopter');
        $helicopters = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Helicopter/list.html.twig', array(
            'helicopters' => $helicopters,
            'helicopterForm' => $form->createView(),
        ));
    }

    function deleteHelicopterAction(Helicopter $helicopter)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($helicopter);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_heli_list'));
    }

    function updateHelicopterAction(Helicopter $helicopter)
    {
        $form = $this->createFormBuilder($helicopter)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();
        
        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($helicopter);
            $em->flush();

            return $this->redirect($this->generateUrl('iry_crud_heli_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Helicopter/update.html.twig', array(
            'helicopterForm' => $form->createView(),
        ));
    }

}
