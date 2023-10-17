<?php
/**
 * @brief bigfoot, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\bigfoot;

use dcCore;
use dcUtils;

class FrontendBehaviors
{
    public static function publicHeadContent(): string
    {
        $settings = My::settings();
        if (!$settings->enabled) {
            return '';
        }

        if ($settings->single) {
            // Single mode only, check if post/page context
            $urlTypes = ['post'];
            if (dcCore::app()->plugins->moduleExists('pages')) {
                $urlTypes[] = 'page';
            }
            if (!in_array(dcCore::app()->url->type, $urlTypes)) {
                return '';
            }
        }

        $style = $settings->style;
        if (!in_array($style, ['default', 'bottom', 'numeric'])) {
            $style = 'default';
        }

        echo
        dcUtils::jsJson('bigfoot', [
            'style' => $style,
            'hover' => ($settings->hover ? true : false),
        ]) .
        My::cssLoad('bigfoot-' . $style . '.css') .
        My::cssLoad('bigfoot.css') .
        My::jsLoad('bigfoot.js') .
        My::jsLoad('apply.js');

        return '';
    }
}
