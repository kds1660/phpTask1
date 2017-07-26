<?php
namespace App\Controllers;

use App\View\SelectStudios;
use App\View\StudioFilms;
use App\View\StudioActors;

class Page2Controller extends AbstractController
{
    public function showAction()
    {
        $this->renderLayout(SelectStudios::class, 'selector.phtml');
        $this->renderLayout(StudioActors::class, 'studio_actors.phtml');
        $this->renderLayout(StudioFilms::class, 'studio_films.phtml');
        echo $this->renderLayout();
    }
}
