<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Studios;

class StudiosList extends AbstractBlock
{
    /**
     * @return array
     */
    public function getStudios(): array
    {
        $selector = $this->em->getRepository(Studios::class)
            ->selectStudios();
        return $selector;
    }
}
