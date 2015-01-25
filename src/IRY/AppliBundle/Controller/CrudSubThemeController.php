<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\SubTheme;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\CourseType;
use IRY\AppliBundle\Entity\Image;
use IRY\AppliBundle\Form\Type\ImageType;
use IRY\AppliBundle\Entity\ImmersiveMovie;
use IRY\AppliBundle\Form\Type\ImmersiveMovieType;
use IRY\AppliBundle\Form\Type\SubThemeType;

class CrudSubThemeController extends Controller
{
    function subThemesAction()
    {
        $subTheme = new SubTheme();
        $form = $this->createFormBuilder($subTheme)
            ->add('name', 'text')
            ->add('theme', 'entity', array(
                'class' => 'IRYAppliBundle:Theme',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($subTheme);
            $em->flush();
        }

        
        $repo = $em->getRepository('IRYAppliBundle:SubTheme');

        $listSubTheme = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:SubTheme/list.html.twig', array(
            'subThemes' => $listSubTheme,
            'addSubThemeForm' => $form->createView(),
        ));
    }

    function deleteSubThemeAction(SubTheme $subTheme)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($subTheme);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_subTheme_list'));
    }

    function updateSubThemeAction(SubTheme $subTheme)
    {
        $form = $this->createFormBuilder($subTheme)
            ->add('name', 'text')
            ->add('theme', 'entity', array(
                'class' => 'IRYAppliBundle:Theme',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($subTheme);
            $em->flush();

            return $this->redirect($this->generateUrl('iry_crud_subTheme_list'));
        }

        return $this->render('IRYAppliBundle:Crud:SubTheme/update.html.twig', array(
            'updateSubThemeForm' => $form->createView(),
        ));
    }

}
