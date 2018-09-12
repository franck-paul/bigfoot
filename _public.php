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
$core->addBehavior('publicFooterContent', ['bigfootPublic', 'publicFooterContent']);

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

        if (version_compare(DC_VERSION, '2.9', '<') && (DC_VERSION != '2.9-dev')) {
            // Use old way to load public resources (Dotclear < 2.9 only)
            $url = $core->blog->getQmarkURL() . 'pf=' . basename(dirname(__FILE__));
            echo
                '<link rel="stylesheet" type="text/css" href="' . $url . '/css/bigfoot-' . $style . '.css" />' . "\n" .
                '<script type="text/javascript" src="' . $url . '/js/bigfoot.js"></script>' . "\n";
        } else {
            echo
            dcUtils::cssLoad($core->blog->getPF('bigfoot/css/bigfoot-' . $style . '.css')) .
            dcUtils::jsLoad($core->blog->getPF('bigfoot/js/bigfoot.js'));
        }
    }

    public static function publicFooterContent($core)
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

        echo
            '<script type="text/javascript">' . "\n" .
            '$(document).ready(function() {' . "\n" .
            'var bigfoot = $.bigfoot({' . "\n" .
            'anchorPattern: /(fn|footnote|note|wiki-footnote)[:\-_\d]/gi,' . "\n" .
            'footnoteTagname: "p, li",' . "\n" .
            ($core->blog->settings->bigfoot->style == 'bottom' ?
            'positionContent: false,' . "\n" : '') . "\n" .
            ($core->blog->settings->bigfoot->hover ?
            'activateOnHover: true,' . "\n" .
            'deleteOnUnhover: true,' . "\n" .
            'hoverDelay: 500,' . "\n" :
            '') . "\n" .
            'numberResetSelector: ".post",' . "\n" .
            'scope: ".post"' . "\n" .
            '});' . "\n" .
            "});\n" .
            "</script>\n";
    }
}
