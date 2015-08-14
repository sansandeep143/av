<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2014 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

defined('_JEXEC') or die;
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require_once __DIR__ . '/helper.php';
$items = ModSPK2FeaturedSliderHelper::getItems($params);

if (count($items))
{

	JHtml::_('jquery.framework');
	$doc = JFactory::getDocument();
	$doc->addScript( JURI::base(true) . '/modules/mod_sp_k2_featured_slider/assets/js/owl.carousel.min.js' );
	$doc->addStylesheet( JURI::base(true) . '/modules/mod_sp_k2_featured_slider/assets/css/owl.carousel.css' );
	$doc->addStylesheet( JURI::base(true) . '/modules/mod_sp_k2_featured_slider/assets/css/style.css' );

	if($params->get('transitionStyle'))
		$doc->addStylesheet( JURI::base(true) . '/modules/mod_sp_k2_featured_slider/assets/css/owl.transitions.css' );
	
	require JModuleHelper::getLayoutPath('mod_sp_k2_featured_slider', $params->get('layout', 'default'));
	
} else {
	echo "<div class='alert alert-info'><strong>SP K2 Featured Slider</strong></p>You don't have any featured K2 items</p></div>";
}