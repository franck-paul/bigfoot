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
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

// dead but useful code, in order to have translations
__('bigfoot') . __('Empowering footnotes');

class bigfootBehaviors
{
    public static function adminBlogPreferencesForm($settings)
    {
        # Style options
        $styles = [
            __('Default') => 'default',
            __('Bottom')  => 'bottom',
            __('Numeric') => 'numeric',
        ];
        $settings->addNameSpace('bigfoot');
        echo
        '<div class="fieldset"><h4 id="bigfoot">Bigfoot</h4>' .
        '<p><label class="classic">' .
        form::checkbox('bigfoot_enabled', '1', $settings->bigfoot->enabled) .
        __('Enable Bigfoot') . '</label></p>' .
        '<h5>' . __('Options') . '</h5>' .
        '<p><label for="bigfoot_style" class="classic">' . __('Style:') . '</label>' .
        form::combo('bigfoot_style', $styles, $settings->bigfoot->style) .
        '</p>' .
        '<p><label for="bigfoot_hover" class="classic">' .
        form::checkbox('bigfoot_hover', '1', $settings->bigfoot->hover) .
        __('Activate on hover') . '</label>' . '</p>' .
        '<p><label for="bigfoot_single" class="classic">' .
        form::checkbox('bigfoot_single', '1', $settings->bigfoot->single) .
        __('Activate only in single entry context') . '</label>' . '</p>' .
            '</div>';
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        $settings->addNameSpace('bigfoot');
        $settings->bigfoot->put('enabled', !empty($_POST['bigfoot_enabled']), 'boolean');
        $settings->bigfoot->put('style', $_POST['bigfoot_style']);
        $settings->bigfoot->put('hover', !empty($_POST['bigfoot_hover']));
        $settings->bigfoot->put('single', !empty($_POST['bigfoot_single']));
    }
}

dcCore::app()->addBehavior('adminBlogPreferencesFormV2', [bigfootBehaviors::class, 'adminBlogPreferencesForm']);
dcCore::app()->addBehavior('adminBeforeBlogSettingsUpdate', [bigfootBehaviors::class, 'adminBeforeBlogSettingsUpdate']);
