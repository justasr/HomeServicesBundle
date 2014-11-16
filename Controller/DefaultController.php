<?php

namespace justasr\HomeServicesBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use justasr\HomeServicesBundle\Entity\User;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = "123";
        return $this->render('justasrHomeServicesBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createUserAction()
    {
        $User = new User();
        $User->setUsername("user");
        $User->setPassword("password");

        $validator = $this->get('validator');
        $errors = $validator->validate($User);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString);
        }


        $dmanager = $this->getDoctrine()->getManager();
        $dmanager->persist($User);
        $dmanager->flush();
        return new Response( sprintf("New UserID: %s ",$User->getId()) );
    }
}
