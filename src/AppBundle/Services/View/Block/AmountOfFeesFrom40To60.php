<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Response;

class AmountOfFeesFrom40To60 extends AbstractBlock
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderBlock(): Response
    {
        return $this->templating->renderResponse('@App/blocks/amountOfFeesFrom40To60.html.twig', [
            'sqlText' => $this->getAmountOfFeesSqlText(),
            'sqlResult' => $this->getAmountOfFeesResult()]);
    }

    /**
     * @return array
     */
    private function getAmountOfFeesResult(): array
    {
        $repository = $this->em->getRepository(Actors::class);
        return $repository->amountOfFeesFrom40To60();
    }

    /**
     * @return string
     */
    private function getAmountOfFeesSqlText(): string
    {
        $repository = $this->em->getRepository(Actors::class);
        return $repository->GetAmountOfFeesFrom40To60Query()->getSQL();
    }
}
