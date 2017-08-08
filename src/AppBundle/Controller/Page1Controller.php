<?php

// src/AppBundle/Controller/Page1Controller.php
namespace AppBundle\Controller;

use AppBundle\Entity\Actors;
use AppBundle\Repositories\Page1Queries;
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
        $repository = $this->getDoctrine()
            ->getRepository(Actors::class);

        $this->addContent($repository->amountOfFeesFrom40To60());
        $this->addContent($repository->uniqueName());

        return $this->render('page1.html.twig', [
            'blocks' => $this->getContent(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}
