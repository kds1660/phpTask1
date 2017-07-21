<?php

namespace App\View;

use App\Db\StudioFilmModel;

class StudioFilms extends AbstractBlock
{
    public function __construct($query='')
    {
        $this->query=$query;
    }

    public function getQueryResults($sql=null): array
    {
        $model = new StudioFilmModel();
        return $model->getStudioFilms($sql);
    }
}
