<?php

namespace IRY\WebDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IRYWebDocBundle:Default:index.html.twig');
    }
}
