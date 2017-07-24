<?php

namespace App\Controllers;

use App\View\Layout;
use App\View\Base;
use App\System\Logger;

abstract class AbstractController
{
    protected function renderLayout(): string
    {
        return Layout::renderContent();
    }

    /**
     * @param string $contentBlock
     * @param string $contentTemplate
     * @return string
     */
    protected function addLayoutContent($contentBlock = '', $contentTemplate = '')
    {
        return Layout::addContent($contentBlock, $contentTemplate);
    }

    public function errorAction()
    {
        Logger::log('IndexController - Load Errorpage. Target ' . $_SERVER['REQUEST_URI']);
        $this->addLayoutContent(Base::class, 'error_page.phtml');
        echo $this->renderLayout();
    }
}
