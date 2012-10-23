<?php

namespace SF\UtilitiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SFUtilitiesBundle:Default:index.html.twig', array('name' => $name));
    }
}
