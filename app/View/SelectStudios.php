<?php

namespace App\View;

use App\Db\SelectStudiosModel;

class SelectStudios extends AbstractBlock
{
    public function getAllStudios(): array
    {
        $model = new SelectStudiosModel();
        return $model->getStudios();
    }
}
