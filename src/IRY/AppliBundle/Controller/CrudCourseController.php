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

class CrudCourseController extends Controller
{
    function coursesAction()
    {
        $course = new Course();
        $form = $this->createFormBuilder($course)
            ->add('name', 'text')
            ->add('typeCourse', 'entity', array(
                'class' => 'IRYAppliBundle:TypeCourse',
                'property' => 'name',
            ))
            ->add('subTheme', 'entity', array(
                'class' => 'IRYAppliBundle:SubTheme',
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
            ->add('typeCourse', 'entity', array(
                'class' => 'IRYAppliBundle:TypeCourse',
                'property' => 'name',
            ))
            ->add('subTheme', 'entity', array(
                'class' => 'IRYAppliBundle:SubTheme',
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

}
