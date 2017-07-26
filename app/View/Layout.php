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
    public static function renderContent($blockClass = '', $template = '')
    {
        if ($blockClass==''&&$template=='') {
            return self::render();
        } else {
            self::$content .= self::render($blockClass, $template);
        }
    }

    public static function addContent($blockClass, $template)
    {

    }

    public static function getContent(): string
    {
        return self::$content;
    }
}
