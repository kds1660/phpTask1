<?php

namespace AppBundle\Services\View\Block;

use AppBundle\Entity\Studios;
use Symfony\Component\HttpFoundation\Response;

class StudiosList extends AbstractBlock
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getStudios(): Response
    {
        $selector = $this->em->getRepository(Studios::class)
            ->selectStudios();

        return $this->templating->renderResponse('@App/default/selector.phtml', [
            'selector' => $selector
        ]);
    }
}
