<?php

namespace IRY\AppliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IRY\AppliBundle\Entity\Helicopter;
use IRY\AppliBundle\Entity\SubTheme;
use IRY\AppliBundle\Entity\Course;
use IRY\AppliBundle\Entity\Step;
use IRY\AppliBundle\Entity\StepType;
use IRY\AppliBundle\Entity\CourseType;
use IRY\AppliBundle\Entity\Image;
use IRY\AppliBundle\Form\Type\ImageType;
use IRY\AppliBundle\Entity\ImmersiveMovie;
use IRY\AppliBundle\Form\Type\ImmersiveMovieType;

class CrudStepController extends Controller
{
    function stepsAction()
    {
        $step = new Step();
        $form = $this->createFormBuilder($step)
            ->add('name', 'text')
            ->add('btn_name', 'text')
            ->add('btn_state', 'text')
            ->add('theOrder', 'text')
            ->add('course', 'entity', array(
                'class' => 'IRYAppliBundle:Course',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($step);
            $em->flush();
        }

        
        $repo = $em->getRepository('IRYAppliBundle:Step');

        $listStep = $repo->findAll();

        return $this->render('IRYAppliBundle:Crud:Step/list.html.twig', array(
            'steps' => $listStep,
            'addStepForm' => $form->createView(),
        ));
    }

    function deleteStepAction(Step $step)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($step);
        $em->flush();

        return $this->redirect($this->generateUrl('iry_crud_step_list'));
    }
    function createStepAction()
    {
        $step = new Step();
        $form = $this->processForm($step);
        
        if ($form === true) {
            return $this->redirect($this->generateUrl('iry_crud_step_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Step/form.html.twig', array(
            'stepForm' => $form->createView(),
        ));
    }
    function updateStepAction(Step $step)
    {
        $form = $this->createFormBuilder($step)
            ->add('name', 'text')
            ->add('btn_name', 'text')
            ->add('btn_state', 'text')
            ->add('theOrder', 'text')
            ->add('course', 'entity', array(
                'class' => 'IRYAppliBundle:Course',
                'property' => 'name',
            ))
            ->add('save', 'submit')
            ->getForm();

        $request = $this->getRequest();
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($step);
            $em->flush();

            return $this->redirect($this->generateUrl('iry_crud_step_list'));
        }

        return $this->render('IRYAppliBundle:Crud:Step/update.html.twig', array(
            'updateStepForm' => $form->createView(),
        ));
    }

}
