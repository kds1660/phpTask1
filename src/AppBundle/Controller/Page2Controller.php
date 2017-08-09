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
        $selector = $this->getDoctrine()
            ->getRepository(Studios::class)
            ->selectStudios();

        return $this->render('page2.html.twig', [
            'selector' => $selector,
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
        return $this->render('responseBlock.html.twig', [
            'studio' => $studio,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

}