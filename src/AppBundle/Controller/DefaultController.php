<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    protected $blockContent;

    public function getResult($block, $sql = '')
    {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare($block->getRequestText());
        $statement->bindValue('studio', $sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getBlock(): array
    {
        return $this->blockContent;
    }

    public function addContent($block, $sql = '')
    {
        $this->blockContent[] = array($block->getRequestText(), $this->getResult($block, $sql));
    }
}
