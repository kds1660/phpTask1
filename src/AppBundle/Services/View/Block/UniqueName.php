<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Response;

class UniqueName extends AbstractBlock
{
    /**
     * @return Response
     */
    public function getBlock(): Response
    {
        return $this->formTemplate(Actors::class, 'uniqueName');
    }
}
