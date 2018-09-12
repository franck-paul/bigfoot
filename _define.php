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
    '0.4',                          // Version
    [
        'requires'    => [['core', '2.13']], // Dependencies
        'permissions' => 'admin',            // Permissions
        'type'        => 'plugin'           // Type
    ]
);
