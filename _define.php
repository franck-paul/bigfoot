<?php

/**
 * @brief bigfoot, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul contact@open-time.net
 * @copyright GPL-2.0
 */
declare(strict_types=1);

if (isset($this) && is_object($this) && method_exists($this, 'registerModule') && isset($this->id) && is_string($this->id)) {
    $this->registerModule(
        'bigfoot',
        'Empowering footnotes',
        'Franck Paul and contributors',
        '5.0',
        [
            'date'        => '2026-08-03T09:45:50+0200',
            'requires'    => [['core', '2.39']],
            'permissions' => 'My',
            'type'        => 'plugin',
            'settings'    => [
                'blog' => '#params.bigfoot',
            ],

            'details'    => 'https://open-time.net/?q=bigfoot',
            'support'    => 'https://github.com/franck-paul/bigfoot',
            'repository' => 'https://raw.githubusercontent.com/franck-paul/bigfoot/main/dcstore.xml',
            'license'    => 'gpl2',
        ]
    );
}
