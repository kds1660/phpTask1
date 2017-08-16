<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Response;

class AmountOfFeesFrom40To60 extends AbstractBlock
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getBlock(): Response
    {
        return $this->formTemplate(Actors::class, 'amountOfFeesFrom40To60');
    }
}
