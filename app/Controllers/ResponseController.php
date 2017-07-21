<?php

namespace App\Controllers;

use App\View\Layout;
use App\View\StudioFilms;
use App\View\StudioActors;

class ResponseController
{
    private $receiveResponse;

    public function __construct($sql)
    {
        $this->receiveResponse = $sql;
    }

    public function responseAction()
    {
        $this->addLayoutContent(new StudioActors($this->receiveResponse), 'studio_actors.phtml');
        $this->addLayoutContent(new StudioFilms($this->receiveResponse), 'studio_films.phtml');
        echo Layout::getContent();
    }

    protected function addLayoutContent($contentBlock = '', $contentTemplate = '')
    {
        return Layout::addContent($contentBlock, $contentTemplate);
    }
}
