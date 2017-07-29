<?php
/**
 * Short description for amazon.php
 *
 * @package amazon
 * @author Kazuya Kanatani
 * @version 0.1
 * @copyright (C) 2017 kinformation<kanatani.social@gmail.com>
 * @license MIT
 */

namespace Grav\Plugin;

use Grav\Common\Plugin;

class AmazonPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onShortcodeHandlers' => ['onShortcodeHandlers', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ];
    }

    /**
     * Add style and script to page.
     */
    public function onTwigSiteVariables()
    {
        $this->grav['assets']->addCss('plugin://amazon/assets/css/amazon.css');
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Initialize configuration
     */
    public function onShortcodeHandlers()
    {
        $this->grav['shortcode']->registerAllShortcodes(__DIR__.'/shortcodes');
    }
}
