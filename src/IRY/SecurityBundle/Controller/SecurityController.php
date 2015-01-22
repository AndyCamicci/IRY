<?php
namespace IRY\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use IRY\SecurityBundle\Entity\User;
use IRY\SecurityBundle\Form\Type\UserType;
use IRY\SecurityBundle\Form\Type\LoginType;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();

        $form = $this->createForm(new LoginType(), null, array(
            'action' => $this->generateUrl('login_check'),
            'method' => 'post',
            'attr' => array("id" => "login_form")
        ));

        $form->handleRequest($request);

        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }


        return $this->render('IRYSecurityBundle:Security:login.html.twig', array(
                'form' => $form->createView(),
                'error' => $error,
        ));
    }

    public function registerAction()
    {

        $user = new User();
        $form = $this->createForm(new UserType(), $user );

        $request = $this->getRequest();
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);

            $em->persist($user);
            $em->flush();
        }

        $repo = $em->getRepository('IRYSecurityBundle:User');

        $users = $repo->findAll();

        return $this->render('IRYSecurityBundle:Security:register.html.twig', array(
            'form' => $form->createView(),
            'users' => $users
        ));


    }


}