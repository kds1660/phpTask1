<?php

namespace App\View;

class Layout
{
    protected static $content = '';

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     */
    public static function render($blockClass = '', $template = ''): string
    {
        if (!$blockClass) {
            $blockClass = Base::class;
        }
        /** @var AbstractBlock $block */

        $block = is_string($blockClass) ? new $blockClass : $blockClass;

        return $block->toHtml($template);
    }

    /**
     * @return string
     */
    public static function renderContent(): string
    {

        return self::render();
    }

    public static function addContent($blockClass, $template)
    {
        self::$content .= self::render($blockClass, $template);
    }

    public static function getContent(): string
    {
        return self::$content;
    }
}
