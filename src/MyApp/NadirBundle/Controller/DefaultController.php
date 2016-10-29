<?php

namespace MyApp\NadirBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppNadirBundle:Default:index.html.twig');
    }
}
