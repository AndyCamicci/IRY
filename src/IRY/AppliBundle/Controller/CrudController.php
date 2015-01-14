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

class CrudController extends Controller
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



    function coursesAction()
    {

        $course = new Course();
        $form = $this->createFormBuilder($course)
            ->add('name', 'text')
            ->add('theme', 'entity', array(
                'class' => 'IRYAppliBundle:Theme',
                'property' => 'fullName',
            ))
            ->add('save', 'submit')
            ->getForm();


        $request = $this->getRequest();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($course);
            $em->flush();
        }

        
        $repo = $em->getRepository('IRYAppliBundle:Course');

        $listCourse = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Course/list.html.twig', array(
            'courses' => $listCourse,
            'addCourseForm' => $form->createView(),
        ));
    }

    function deleteCourseAction(Course $course)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($course);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_course_list'));
    }

    function updateCourseAction(Course $course)
    {
        $form = $this->createFormBuilder($course)
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
            $em->persist($course);
            $em->flush();

            return $this->redirect($this->generateUrl('iry_crud_course_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Course/update.html.twig', array(
            'updateCourseForm' => $form->createView(),
        ));
    }
    function imagesAction()
    {
        $image = new Image();
        $form = $this->createForm(new ImageType(), $image );

        $request = $this->getRequest();
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $em->persist($image);
            $em->flush();
        }

        $repo = $em->getRepository('IRYAppliBundle:Image');

        $images = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Image/show.html.twig', array(
            'Form' => $form->createView(),
            'images' => $images
        ));
    }
    function immersiveMoviesAction()
    {
        $immersiveMovie = new ImmersiveMovie();
        $form = $this->createForm(new ImmersiveMovieType(), $immersiveMovie );

        $request = $this->getRequest();
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $em->persist($immersiveMovie);
            $em->flush();
        }

        $repo = $em->getRepository('IRYAppliBundle:ImmersiveMovie');

        $immersiveMovies = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:ImmersiveMovie/show.html.twig', array(
            'Form' => $form->createView(),
            'immersiveMovies' => $immersiveMovies
        ));
    }

}
