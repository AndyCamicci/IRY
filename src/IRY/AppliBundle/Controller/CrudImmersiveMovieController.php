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

class CrudImmersiveMovieController extends Controller
{
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
