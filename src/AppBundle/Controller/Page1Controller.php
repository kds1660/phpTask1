<?php

// src/AppBundle/Controller/Page1Controller.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model;
use Symfony\Component\HttpFoundation\Response;

class Page1Controller extends DefaultController
{
    /**
     * @Route("/page1/show")
     */
    public function indexAction(): Response
    {
        $block = new Model\AmountOfFeesFrom40To60Model();
        $this->addContent($block);
        $block = new Model\UniqueNameModel();
        $this->addContent($block);

        return new Response($this->renderView('page1.html.twig', [
            'blocks' => $this->getBlock(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]));
    }
}
