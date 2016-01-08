<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of bigfoot, a plugin for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('publicHeadContent',array('bigfootPublic','publicHeadContent'));
$core->addBehavior('publicFooterContent',array('bigfootPublic','publicFooterContent'));

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
			$urlTypes = array('post');
			if ($core->plugins->moduleExists('pages')) {
				$urlTypes[] = 'page';
			}
			if (!in_array($core->url->type,$urlTypes)) {
				return;
			}
		}

		$style = $core->blog->settings->bigfoot->style;
		if (!in_array($style,array('default','bottom','numeric'))) {
			$style = 'default';
		}

		if (version_compare(DC_VERSION,'2.9','<') && (DC_VERSION != '2.9-dev'))
		{
			// Use old way to load public resources (Dotclear < 2.9 only)
			$url = $core->blog->getQmarkURL().'pf='.basename(dirname(__FILE__));
			echo
			'<link rel="stylesheet" type="text/css" href="'.$url.'/css/bigfoot-'.$style.'.css" />'."\n".
			'<script type="text/javascript" src="'.$url.'/js/bigfoot.js"></script>'."\n";
		} else {
			echo
			dcUtils::cssLoad($core->blog->getPF('bigfoot/css/bigfoot-'.$style.'.css')).
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
			$urlTypes = array('post');
			if ($core->plugins->moduleExists('pages')) {
				$urlTypes[] = 'page';
			}
			if (!in_array($core->url->type,$urlTypes)) {
				return;
			}
		}

		echo
		'<script type="text/javascript">'."\n".
		"//<![CDATA[\n".
		'$(document).ready(function() {'."\n".
			'var bigfoot = $.bigfoot({'."\n".
				'anchorPattern: /(fn|footnote|note|wiki-footnote)[:\-_\d]/gi,'."\n".
				'footnoteTagname: "p, li",'."\n".
				($core->blog->settings->bigfoot->style == 'bottom' ?
					'positionContent: false,'."\n" : '')."\n".
				($core->blog->settings->bigfoot->hover ?
					'activateOnHover: true,'."\n".
					'deleteOnUnhover: true,'."\n".
					'hoverDelay: 500,'."\n" :
					'')."\n".
				'numberResetSelector: ".post-content",'."\n".
				'scope: ".post-content"'."\n".
			'});'."\n".
		"});\n".
		"\n//]]>\n".
		"</script>\n";
	}
}
