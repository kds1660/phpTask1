<?php

namespace App\Controllers;

use App\View\AmountOfFeesFrom40To60;

class Page1Controller extends \App\Controllers\AbstractController
{
    public function showAction()
    {
        echo $this->renderLayout(AmountOfFeesFrom40To60::class, 'amount_of_fees_from_40_to_60.phtml');
    }
}
