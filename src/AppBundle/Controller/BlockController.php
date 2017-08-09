<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Actors;
use AppBundle\Entity\Studios;
use Symfony\Component\HttpFoundation\Response;

class BlockController extends Controller
{
    /**
     * @param $entityClassName
     * @param $string
     * @param string $studio
     * @return Response
     */
    private function formTemplate($entityClassName, $methodString, $studio = ''): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository($entityClassName);
        $viewTemplate = 'blocks/' . $methodString . '.html.twig';
        $sqlText = 'get' . lcfirst($methodString) . 'Query';
        return $this->render($viewTemplate, [
            'sqlText' => $repository->$sqlText()->getSQL(),
            'sqlResult' => $repository->$methodString($studio),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function amountOfFeesFrom40To60Action(): Response
    {
        $str = str_replace('Action', '', __FUNCTION__);
        return $this->formTemplate(Actors::class, $str);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function uniqueNameAction(): Response
    {
        $str = str_replace('Action', '', __FUNCTION__);
        return $this->formTemplate(Actors::class, $str);
    }

    /**
     * @param string $studio
     * @return Response
     */
    public function studioActorsAction($studio = ''): Response
    {
        $str = str_replace('Action', '', __FUNCTION__);
        return $this->formTemplate(Studios::class, $str, $studio);
    }

    /**
     * @param string $studio
     * @return Response
     */
    public function studioFilmsAction($studio = ''): Response
    {
        $str = str_replace('Action', '', __FUNCTION__);
        return $this->formTemplate(Studios::class, $str, $studio);
    }
}
