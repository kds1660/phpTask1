<?php

namespace App\View;

use App\Db\Model;

class AmountOfFeesFrom40To60 extends AbstractBlock
{
    public function getQueryResults(): array
    {
        $model = new Model();
        return $model->getAmountOfFeesFrom40To60();
    }
}
