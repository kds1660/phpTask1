<?php

namespace App\View;

abstract class AbstractBlock
{
    /**
     * @param string $template
     * @return string
     */

    public function toHtml($template = ''): string
    {
        if (!$template) {
            $fullClassName = explode('\\', strtolower(get_class($this)));
            array_shift($fullClassName);
            array_shift($fullClassName);
            $fullClassName = array_merge(['app', 'views'], $fullClassName);
            $template = implode(DIRECTORY_SEPARATOR, $fullClassName) . '.phtml';
        } else {
            $template = 'app/views/' . $template;
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     */
    public function renderBlock($blockClass = '', $template = ''): string
    {
        return Layout::render($blockClass, $template);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return Layout::getContent();
    }

    public function getQueryResults($sql = null)
    {
        $search = explode('\\', get_class($this));
        $search = 'App\\Db\\' . $search[count($search) - 1] . 'Model';
        $model = new $search();
        return $model->getResult($sql);
    }

}
