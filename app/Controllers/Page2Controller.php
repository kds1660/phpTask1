<?php
namespace App\Controllers;

use App\View\SelectStudios;
use App\View\StudioFilms;
use App\View\StudioActors;

class Page2Controller extends AbstractController
{
    public function showAction()
    {
        $this->addLayoutContent(SelectStudios::class, 'selector.phtml');
        $this->addLayoutContent(StudioActors::class, 'studio_actors.phtml');
        $this->addLayoutContent(StudioFilms::class, 'studio_films.phtml');
        echo $this->renderLayout();
    }
}
