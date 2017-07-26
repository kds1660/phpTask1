<?php

namespace App\Controllers;

use App\Db\AbstractModel;
use App\View\Layout;
use App\View\StudioFilms;
use App\View\StudioActors;

class ResponseController extends AbstractController
{
    private $receiveResponse;

    public function __construct($sql)
    {
        $this->receiveResponse = $sql;
    }

    public function responseAction()
    {
        $this->renderLayout(new StudioActors($this->receiveResponse), 'studio_actors.phtml');
        $this->renderLayout(new StudioFilms($this->receiveResponse), 'studio_films.phtml');
        echo Layout::getContent();
    }
}
