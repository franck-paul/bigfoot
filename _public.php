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
if (!defined('DC_RC_PATH')) {
    return;
}

dcCore::app()->addBehavior('publicHeadContent', ['bigfootPublic', 'publicHeadContent']);

class bigfootPublic
{
    public static function publicHeadContent($core)
    {
        dcCore::app()->blog->settings->addNameSpace('bigfoot');
        if (!dcCore::app()->blog->settings->bigfoot->enabled) {
            return;
        }

        if (dcCore::app()->blog->settings->bigfoot->single) {
            // Single mode only, check if post/page context
            $urlTypes = ['post'];
            if (dcCore::app()->plugins->moduleExists('pages')) {
                $urlTypes[] = 'page';
            }
            if (!in_array(dcCore::app()->url->type, $urlTypes)) {
                return;
            }
        }

        $style = dcCore::app()->blog->settings->bigfoot->style;
        if (!in_array($style, ['default', 'bottom', 'numeric'])) {
            $style = 'default';
        }

        echo
        dcUtils::jsJson('bigfoot', [
            'style' => $style,
            'hover' => (dcCore::app()->blog->settings->bigfoot->hover ? true : false),
        ]) .
        dcUtils::cssModuleLoad('bigfoot/css/bigfoot-' . $style . '.css') .
        dcUtils::cssModuleLoad('bigfoot/css/bigfoot.css') .
        dcUtils::jsModuleLoad('bigfoot/js/bigfoot.js') .
        dcUtils::jsModuleLoad('bigfoot/js/apply.js');
    }
}
