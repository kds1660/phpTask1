<?php

// src/AppBundle/Controller/Page2Controller.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model;

class Page2Controller extends DefaultController
{
    /**
     * @Route("/page2/show")
     */
    public function indexAction(): Response
    {
        $block = new Model\StudioActorsModel();
        $this->addContent($block);
        $block = new Model\StudioFilmsModel();
        $this->addContent($block);
        $selector = new Model\SelectStudiosModel();

        return new Response($this->renderView('page2.html.twig', [
            'selector' => $this->getResult($selector),
            'blocks' => $this->getBlock(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]));
    }

    /**
     * @Route("/page2/studio")
     */
    public function studioAction(Request $request)
    {
        $studio = $request->request->get('studio');
        $block = new Model\StudioActorsModel();
        $this->addContent($block, $studio);
        $block = new Model\StudioFilmsModel();
        $this->addContent($block, $studio);


        if ($request->headers->get('Content-Type') === 'application/json') {
            return new JsonResponse($this->getBlock());
        }

        return $this->render('responseBlock.html.twig', [
            'blocks' => $this->getBlock(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}