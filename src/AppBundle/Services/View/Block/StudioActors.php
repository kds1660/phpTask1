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
    public function getBlock($studio = ''): Response
    {
        return $this->formTemplate(Studios::class, 'studioActors', $studio);
    }
}
