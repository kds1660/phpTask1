<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Page1Controller extends Controller
{
    /**
     * @return Response
     */

    public function indexAction(): Response
    {
        return $this->render('@App/page1.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}
