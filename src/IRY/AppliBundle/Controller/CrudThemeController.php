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

class CrudThemeController extends Controller
{
    function themesAction()
    {

        $theme = new Theme();
        $form = $this->createFormBuilder($theme)
            ->add('name', 'text')
            ->add('helicopter', 'entity', array(
                'class' => 'IRYAppliBundle:Helicopter',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();


        $request = $this->getRequest();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($theme);
            $em->flush();
        }

        
        $repo = $em->getRepository('IRYAppliBundle:Theme');

        $listTheme = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Theme/list.html.twig', array(
            'themes' => $listTheme,
            'addThemeForm' => $form->createView(),
        ));
    }

    function deleteThemeAction(Theme $theme)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($theme);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_theme_list'));
    }

    function updateThemeAction(Theme $theme)
    {
        $form = $this->createFormBuilder($theme)
            ->add('name', 'text')
            ->add('helicopter', 'entity', array(
                'class' => 'IRYAppliBundle:Helicopter',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($theme);
            $em->flush();

            return $this->redirect($this->generateUrl('iry_crud_theme_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Theme/update.html.twig', array(
            'updateThemeForm' => $form->createView(),
        ));
    }

}
