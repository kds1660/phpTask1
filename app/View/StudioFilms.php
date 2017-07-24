<?php

namespace App\View;

use App\Db\StudioFilmsModel;

class StudioFilms extends AbstractBlock
{
    public function __construct($query = '')
    {
        $this->query = $query;
    }
}
