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

if (!defined('DC_CONTEXT_ADMIN')) { return; }

// dead but useful code, in order to have translations
__('bigfoot').__('Empowering footnotes');

$core->addBehavior('adminBlogPreferencesForm',array('bigfootBehaviors','adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('bigfootBehaviors','adminBeforeBlogSettingsUpdate'));

class bigfootBehaviors
{
	public static function adminBlogPreferencesForm($core,$settings)
	{
		# Style options
		$styles = array(
			__("Default") => 'default',
			__("Bottom") => 'bottom',
			__("Numeric") => 'numeric'
		);
		$settings->addNameSpace('bigfoot');
		echo
		'<div class="fieldset"><h4>Bigfoot</h4>'.
		'<p><label class="classic">'.
		form::checkbox('bigfoot_enabled','1',$settings->bigfoot->enabled).
		__('Enable Bigfoot').'</label></p>'.
		'<h5>'.__('Options').'</h5>'.
		'<p><label for="bigfoot_style" class="classic">'.__('Style:').'</label>'.
		form::combo('bigfoot_style',$styles,$settings->bigfoot->style).
		'</p>'.
		'<p><label for="bigfoot_hover" class="classic">'.
		form::checkbox('bigfoot_hover','1',$settings->bigfoot->hover).
		__('Activate on hover').'</label>'.'</p>'.
		'</div>';
	}

	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('bigfoot');
		$settings->bigfoot->put('enabled',!empty($_POST['bigfoot_enabled']),'boolean');
		$settings->bigfoot->put('style',$_POST['bigfoot_style']);
		$settings->bigfoot->put('hover',!empty($_POST['bigfoot_hover']));
	}
}
