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
// Include helper file
require_once (dirname(__FILE__).DS.'helper.php');
$mainframe = JFactory::getApplication();
$document =& JFactory::getDocument();
$library = JURI::base(true).'/media/plg_jblibrary/';
$modbase = JURI::base(true).'/modules/mod_hoverBox/';
$id = $module->id;


// PrettyPhoto Settings
$prettyPhoto = $params->get('prettyPhoto','1');
$padding = str_replace('px', '', $params->get('padding','40'));
$resize = $params->get('resize','true');
$theme = $params->get('theme','dark_rounded');
$prettyBoxTitle = $params->get('prettyBoxTitle','false');
$opacity = $params->get('opacity','0.6');
$prettyBoxSpeed = $params->get('prettyBoxSpeed','normal');
$rightMargin = $params->get('right_margin','0');


// Image Size and container
$boxwidth = $params->get('boxwidth','400px');
$boxposition = $params->get('boxposition','left');
$hoverTopOffset = str_replace('px', '', $params->get('hoverTopOffset','0'));
$hoverLeftOffset = str_replace('px', '', $params->get('hoverLeftOffset','0'));
$thumbWidth = str_replace('px', '', $params->get('thumbWidth','100px'));
$thumbHeight = str_replace('px', '', $params->get('thumbHeight','100px'));
$crop_height = str_replace('px', '', $params->get('crop_height', '100'));
$crop_width = str_replace('px', '', $params->get('crop_width','2'));
$img_width = str_replace('px', '', $params->get('img_width','150'));
$img_height = str_replace('px', '', $params->get('img_height','100'));
$height = str_replace('px', '', $params->get('height','200'));
$overlayGallery = $params->get('overlayGallery','1');


//include css styles in head if cache not enabled
if(!($mainframe->getCfg('caching'))){
	// prettyPhoto Styles
	$document->addStyleDeclaration('.hoverBox'.$id.' {float: '.$boxposition.';width:'.$boxwidth.';}.hoverBox'.$id.' a img {margin-right:'.$rightMargin.'px;width: '.$thumbWidth.'px;height:'.$thumbHeight.'px }.hoverBox'.$id.' a {width: '.$thumbWidth.'px;height:'.$thumbHeight.'px }  .hoverBox'.$id.' a:hover img {margin-top:'.$hoverTopOffset.'px;margin-left:'.$hoverLeftOffset.'px;}');
}

if(!($mainframe->getCfg('caching'))){
	$document->addStyleSheet($modbase.'/css/hoverBox.css');
}
	if(!($mainframe->getCfg('caching')) && ($prettyPhoto)){
	$document->addStyleSheet($library.'prettyPhoto/css/prettyPhoto.css');
	// prettyPhoto Scripts
	$document->addScript($library.'prettyPhoto/js/jquery.prettyPhoto.js');
}

//get items from helper
$items = modhoverBoxHelper::getList($params, $id);

//load template
require(JModuleHelper::getLayoutPath('mod_hoverBox', 'default'));
?>
