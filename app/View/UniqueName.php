<?php

namespace App\View;

use App\Db\UniqueNameModel;

class UniqueName extends AbstractBlock
{
    public function getQueryResults(): array
    {
        $model = new UniqueNameModel();
        return $model->getUniqueLastName();
    }
}
