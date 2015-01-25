<?php

namespace IRY\WebDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IRYWebDocBundle:Default:index.html.twig');
    }
    public function thanksAction()
    {
        return $this->render('IRYWebDocBundle:Default:thanks.html.twig');
    }
    public function categoriesAction()
    {
        return $this->render('IRYWebDocBundle:Default:thanks.html.twig');
    }
    public function historyAction()
    {
        return $this->render('IRYWebDocBundle:Default:history.html.twig');
    }
    public function teamAction()
    {
        return $this->render('IRYWebDocBundle:Default:team.html.twig');
    }
}
