<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        echo $this->renderLayout();
    }
}
