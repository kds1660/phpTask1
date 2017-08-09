<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Actors;
use AppBundle\Entity\Studios;
use Symfony\Component\HttpFoundation\Response;

class BlockController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function amountOfFeesAction(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Actors::class);

        return $this->render('blocks/amountOfFeesBlock.html.twig', [
            'sqlText' => $repository->getAmountOfFeesQuery()->getSQL(),
            'sqlResult' => $repository->amountOfFeesFrom40To60(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function uniqueNameAction(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Actors::class);
        return $this->render('blocks/uniqueName.html.twig', [
            'sqlText' => $repository->getUniqueNameQuery()->getSQL(),
            'sqlResult' => $repository->uniqueName(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function studioActorsAction($studio = ''): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Studios::class);

        return $this->render('blocks/studioActors.html.twig', [
            'sqlText' => $repository->getStudioActorsQuery()->getSQL(),
            'sqlResult' => $repository->studioActors($studio),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function studioFilmsAction($studio = ''): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Studios::class);

        return $this->render('blocks/studioFilms.html.twig', [
            'sqlText' => $repository->getStudioFilmsQuery()->getSQL(),
            'sqlResult' => $repository->studioFilms($studio),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}
