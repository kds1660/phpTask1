<?php

namespace App\Controllers;

use App\View\Layout;

abstract class AbstractController
{
    /**
     * @param string $contentBlock
     * @param string $contentTemplate
     * @return string
     */
    protected function renderLayout($contentBlock = '', $contentTemplate = ''): string
    {
        return Layout::renderContent($contentBlock, $contentTemplate);
    }
}
