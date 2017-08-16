<?php

namespace AppBundle\Services\View\Block;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class AbstractBlock
{
    private $templating;
    private $em;

    public function __construct(EngineInterface $templating, EntityManagerInterface $entityManager)
    {
        $this->templating = $templating;
        $this->em = $entityManager;
    }

    /**
     * @param $entityClassName
     * @param $methodString
     * @param string $studio
     * @return Response
     */
    protected function formTemplate($entityClassName, $methodString, $studio = ''): Response
    {
        $repository = $this->em->getRepository($entityClassName);
        $viewTemplate = '@App/blocks/' . $methodString . '.html.twig';
        $sqlText = 'get' . lcfirst($methodString) . 'Query';
        return $this->templating->renderResponse($viewTemplate, [
            'sqlText' => $repository->$sqlText()->getSQL(),
            'sqlResult' => $repository->$methodString($studio)]);
    }
}
