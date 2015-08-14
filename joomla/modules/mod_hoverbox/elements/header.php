<?php
/**
 * @package		Hoverbox
 * @subpackage	Hoverbox
 * @author		Joomla Bamboo - design@joomlabamboo.com
 * @copyright 	Copyright (c) 2013 Joomla Bamboo. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @version		1.0.3
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
class JElementHeader extends JElement {
	var	$_name = 'header';
	function fetchElement($name, $value, &$node, $control_name){
		// Output
		return '
		<div style="font-weight:bold;font-size:14px;color:#fff;padding:4px;margin:0;background:#4D7502;">
			'.JText::_($value).'
		</div>
		';
	}
	function fetchTooltip($label, $description, &$node, $control_name, $name){
		// Output
		return '&nbsp;';
	}
}
