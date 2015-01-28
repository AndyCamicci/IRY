<?php

namespace IRY\WebDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IRYWebDocBundle:Default:index.html.twig');
    }
    public function conceptAction()
    {
        return $this->render('IRYWebDocBundle:Default:concept.html.twig');
    }
    public function historiqueAction()
    {
        return $this->render('IRYWebDocBundle:Default:historique.html.twig');
    }
    public function equipeAction()
    {
        return $this->render('IRYWebDocBundle:Default:equipe.html.twig');
    }
    public function dispositifAction()
    {
        return $this->render('IRYWebDocBundle:Default:dispositif.html.twig');
    }
    public function enjeuxAction()
    {
        return $this->render('IRYWebDocBundle:Default:enjeux.html.twig');
    }
    public function remerciementsAction()
    {
        return $this->render('IRYWebDocBundle:Default:remerciements.html.twig');
    }
    public function oculusAction()
    {
        return $this->render('IRYWebDocBundle:Default:oculus.html.twig');
    }
    public function leapAction()
    {
        return $this->render('IRYWebDocBundle:Default:leap.html.twig');
    }
}
