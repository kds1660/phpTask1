<?php

// src/AppBundle/Controller/Page2Controller.php
namespace AppBundle\Controller;

use AppBundle\Entity\Studios;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Page2Controller extends DefaultController
{
    /**
     *  * @param Request $request
     * @return Response
     * @Route("/page2/show")
     */

    public function indexAction(Request $request): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Studios::class);

        $this->addContent($repository->studioActors());
        $this->addContent($repository->studioFilms());

        $selector = $repository->selectStudios();
        return $this->render('page1.html.twig', [
            'selector' => $selector,
            'blocks' => $this->getContent(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse|Response
     * @Route("/page2/studio")
     */

    public function studioAction(Request $request)
    {
        $studio = $request->request->get('studio');
        //TODO get json request params
        $repository = $this->getDoctrine()
            ->getRepository(Studios::class);

        $this->addContent($repository->studioActors($studio));
        $this->addContent($repository->studioFilms($studio));

        if ($request->headers->get('Content-Type') === 'application/json') {
            return new JsonResponse($this->getContent());
        }
        return $this->render('responseBlock.html.twig', [
            'blocks' => $this->getContent(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

}