<?php

namespace App\View;

use App\Db\AbstractModel;
use App\Db\SelectStudiosModel;

class SelectStudios extends AbstractBlock
{
    public function getQueryResults(): array
    {
        $model = new SelectStudiosModel();
        return $model->getStudios();
    }
}
