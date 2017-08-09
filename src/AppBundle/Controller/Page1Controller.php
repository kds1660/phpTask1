<?php

// src/AppBundle/Controller/Page1Controller.php
namespace AppBundle\Controller;

use AppBundle\Entity\Actors;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Page1Controller extends DefaultController
{
    /**
     * @Route("/page1/show")
     * @param Request $request
     * @return Response
     */

    public function indexAction(Request $request): Response
    {
        return $this->render('page1.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}
