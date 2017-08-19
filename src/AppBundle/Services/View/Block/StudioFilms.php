<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Studios;
use Symfony\Component\HttpFoundation\Response;

class StudioFilms extends AbstractBlock
{
    /**
     * @param string $studio
     * @return Response
     */
    public function renderBlock($studio = ''): Response
    {
        return $this->templating->renderResponse('@App/blocks/studioActors.html.twig', [
            'sqlText' => $this->getStudioFilmsSqlText(),
            'sqlResult' => $this->getStudioFilmsResult($studio)]);
    }

    /**
     * @param string $studio
     * @return array
     */
    private function getStudioFilmsResult($studio = ''): array
    {
        $repository = $this->em->getRepository(Studios::class);
        return $repository->studioFilms($studio);
    }

    /**
     * @return string
     */
    private function getStudioFilmsSqlText(): string
    {
        $repository = $this->em->getRepository(Studios::class);
        return $repository->GetStudioFilmsQuery()->getSQL();
    }
}
