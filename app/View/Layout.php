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
        $block = new $blockClass;

        return $block->toHtml($template);
    }

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     */
    public static function renderContent($blockClass, $template = ''): string
    {
        if ($blockClass || $template) {
            self::$content = self::render($blockClass, $template);
        }
        return self::render();
    }

    /**
     * @return string
     */
    public static function getContent(): string
    {
        return self::$content;
    }
}
