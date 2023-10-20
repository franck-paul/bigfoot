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

use Dotclear\App;
use Dotclear\Helper\Html\Form\Checkbox;
use Dotclear\Helper\Html\Form\Fieldset;
use Dotclear\Helper\Html\Form\Label;
use Dotclear\Helper\Html\Form\Legend;
use Dotclear\Helper\Html\Form\Para;
use Dotclear\Helper\Html\Form\Select;
use Dotclear\Helper\Html\Form\Text;

class BackendBehaviors
{
    public static function adminBlogPreferencesForm(): string
    {
        $settings = My::settings();

        # Style options
        $styles = [
            __('Default') => 'default',
            __('Bottom')  => 'bottom',
            __('Numeric') => 'numeric',
        ];

        echo
        (new Fieldset('bigfoot'))
        ->legend((new Legend(__('Bigfoot'))))
        ->fields([
            (new Para())->items([
                (new Checkbox('bigfoot_enabled', (bool) $settings->enabled))
                ->value(1)
                ->label((new Label(__('Enable Bigfoot'), Label::INSIDE_TEXT_AFTER))),
            ]),
            (new Text('h5', __('Options'))),
            (new Para())->items([
                (new Select('bigfoot_style'))
                ->items($styles)
                ->default($settings->style)
                ->label((new Label(__('Style:'), Label::INSIDE_TEXT_BEFORE))),
            ]),
            (new Para())->items([
                (new Checkbox('bigfoot_hover', (bool) $settings->hover))
                ->value(1)
                ->label((new Label(__('Activate on hover'), Label::INSIDE_TEXT_AFTER))),
            ]),

            (new Para())->items([
                (new Checkbox('bigfoot_single', (bool) $settings->single))
                ->value(1)
                ->label((new Label(__('Activate only in single entry context'), Label::INSIDE_TEXT_AFTER))),
            ]),
        ])
        ->render();

        return '';
    }

    public static function adminBeforeBlogSettingsUpdate(): string
    {
        $settings = My::settings();

        $settings->put('enabled', !empty($_POST['bigfoot_enabled']), App::blogWorkspace()::NS_BOOL);
        $settings->put('style', $_POST['bigfoot_style'], App::blogWorkspace()::NS_STRING);
        $settings->put('hover', !empty($_POST['bigfoot_hover']), App::blogWorkspace()::NS_BOOL);
        $settings->put('single', !empty($_POST['bigfoot_single']), App::blogWorkspace()::NS_BOOL);

        return '';
    }
}
