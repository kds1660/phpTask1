<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Response;

class UniqueName extends AbstractBlock
{
    /**
     * @return Response
     */
    public function renderBlock(): Response
    {
        return $this->templating->renderResponse('@App/blocks/uniqueName.html.twig', [
            'sqlText' => $this->getUniqueNameSqlText(),
            'sqlResult' => $this->getUniqueNameResult()]);
    }

    /**
     * @return array
     */
    private function getUniqueNameResult(): array
    {
        $repository = $this->em->getRepository(Actors::class);
        return $repository->uniqueName();
    }

    /**
     * @return string
     */
    private function getUniqueNameSqlText(): string
    {
        $repository = $this->em->getRepository(Actors::class);
        return $repository->GetUniqueNameQuery()->getSQL();
    }
}
