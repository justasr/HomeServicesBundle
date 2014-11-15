<?php

namespace justasr\HomeServicesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('justasrHomeServicesBundle:Default:index.html.twig', array('name' => $name));
    }
}
