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

if (!defined('DC_RC_PATH')) {return;}

$core->addBehavior('publicHeadContent', ['bigfootPublic', 'publicHeadContent']);

class bigfootPublic
{
    public static function publicHeadContent($core)
    {
        $core->blog->settings->addNameSpace('bigfoot');
        if (!$core->blog->settings->bigfoot->enabled) {
            return;
        }

        if ($core->blog->settings->bigfoot->single) {
            // Single mode only, check if post/page context
            $urlTypes = ['post'];
            if ($core->plugins->moduleExists('pages')) {
                $urlTypes[] = 'page';
            }
            if (!in_array($core->url->type, $urlTypes)) {
                return;
            }
        }

        $style = $core->blog->settings->bigfoot->style;
        if (!in_array($style, ['default', 'bottom', 'numeric'])) {
            $style = 'default';
        }

        echo
        dcUtils::jsJson('bigfoot', [
            'style' => $style,
            'hover' => ($core->blog->settings->bigfoot->hover ? true : false)
        ]) .
        dcUtils::cssLoad($core->blog->getPF('bigfoot/css/bigfoot-' . $style . '.css')) .
        dcUtils::cssLoad($core->blog->getPF('bigfoot/css/bigfoot.css')) .
        dcUtils::jsLoad($core->blog->getPF('bigfoot/js/bigfoot.js')) .
        dcUtils::jsLoad($core->blog->getPF('bigfoot/js/apply.js'));
    }
}
