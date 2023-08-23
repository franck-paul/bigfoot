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
    '2.0',
    [
        'requires'    => [['core', '2.27'], ['php', '8.1']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_ADMIN,
        ]),
        'type'     => 'plugin',
        'settings' => [
            'blog' => '#params.bigfoot',
        ],

        'details'    => 'https://open-time.net/?q=bigfoot',
        'support'    => 'https://github.com/franck-paul/bigfoot',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/bigfoot/master/dcstore.xml',
    ]
);
