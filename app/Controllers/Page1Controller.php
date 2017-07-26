<?php

namespace App\Controllers;

use App\View\AmountOfFeesFrom40To60;
use App\View\UniqueName;

class Page1Controller extends AbstractController
{
    public function showAction()
    {
        $this->renderLayout(UniqueName::class, 'unique_name.phtml');
        $this->renderLayout(AmountOfFeesFrom40To60::class, 'amount_of_fees_from_40_to_60.phtml');
        echo $this->renderLayout();
    }
}
