<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Studios;
use Symfony\Component\HttpFoundation\Response;

class StudioActors extends AbstractBlock
{
    /**
     * @param string $studio
     * @return Response
     */
    public function renderBlock($studio = ''): Response
    {
        return $this->templating->renderResponse('@App/blocks/studioActors.html.twig', [
            'sqlText' => $this->getStudioActorsSqlText(),
            'sqlResult' => $this->getStudioActorsResult($studio)]);
    }

    /**
     * @param string $studio
     * @return array
     */
    private function getStudioActorsResult($studio = ''): array
    {
        $repository = $this->em->getRepository(Studios::class);
        return $repository->studioActors($studio);
    }

    /**
     * @return string
     */
    private function getStudioActorsSqlText(): string
    {
        $repository = $this->em->getRepository(Studios::class);
        return $repository->GetStudioActorsQuery()->getSQL();
    }
}
