<?php

namespace AppBundle\Services\View\Block;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class AbstractBlock
{
    protected $templating;
    protected $em;

    public function __construct(EngineInterface $templating, EntityManagerInterface $entityManager)
    {
        $this->templating = $templating;
        $this->em = $entityManager;
    }
}
