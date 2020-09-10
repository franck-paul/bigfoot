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

if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    "bigfoot",                      // Name
    "Empowering footnotes",         // Description
    "Franck Paul and contributors", // Author
    '0.5',                          // Version
    [
        'requires'    => [['core', '2.17']], // Dependencies
        'permissions' => 'admin',            // Permissions
        'type'        => 'plugin',           // Type
        'details'     => 'https://open-time.net/?q=bigfoot',      // Details URL
        'support'     => 'https://github.com/franck-paul/bigfoot', // Support URL
        'settings'    => [
            'blog' => '#params.bigfoot'
        ]
    ]
);
