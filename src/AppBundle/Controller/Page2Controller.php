<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Studios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Page2Controller extends Controller
{
    /**
     * @return Response
     */

    public function indexAction(): Response
    {
        return $this->render('@App/page2.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     */

    public function studioAction(Request $request) : Response
    {
        $studio = $request->request->get('studio');
        //TODO get json request params
        return $this->render('@App/responseBlock.html.twig', [
            'studio' => $studio
            ]);
    }

}