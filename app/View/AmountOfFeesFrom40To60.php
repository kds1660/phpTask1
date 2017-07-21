<?php

namespace App\View;

use App\Db\AmountFeesModel;

class AmountOfFeesFrom40To60 extends AbstractBlock
{
    public function getQueryResults(): array
    {
        $model = new AmountFeesModel();
        return $model->getAmountOfFeesFrom40To60();
    }
}
