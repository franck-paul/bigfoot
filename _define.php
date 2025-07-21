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
 * @copyright GPL-2.0
 */
$this->registerModule(
    'bigfoot',
    'Empowering footnotes',
    'Franck Paul and contributors',
    '3.2',
    [
        'date'        => '2003-08-13T13:42:00+0100',
        'requires'    => [['core', '2.28']],
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
