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

class CrudImageController extends Controller
{
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
}
