<?php
/**
* @title		joombig nivo banner
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2014 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
    // no direct access
    defined('_JEXEC') or die('Restricted access');
	$mosConfig_absolute_path = JPATH_SITE;
	$mosConfig_live_site = JURI :: base();
	if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }

    $module_name             = basename(dirname(__FILE__));
    $module_dir              = dirname(__FILE__);
    $module_id               = $module->id;
    $document                = JFactory::getDocument();
    $style                   = $params->get('sp_style');


    if( empty($style) )
    {
        JFactory::getApplication()->enqueueMessage( 'Slider style no declared. Check sp smart slider configuration and save again from admin panel' , 'error');
        return;
    }

    $layoutoverwritepath     = JURI::base(true) . '/templates/'.$document->template.'/html/'. $module_name. '/tmpl/'.$style;
    $document                = JFactory::getDocument();
    require_once $module_dir.'/helper.php';
    $helper = new mod_Joombignivobanner($params, $module_id);
    $data = (array) $helper->display();
	$enable_jQuery 			= $params->get('enable_jQuery', 1);
	$width_module			= $params->get('width_module', "100%");
	$height_module 			= $params->get('height_module', "360");
	$left_module 			= $params->get('left_module', "0");
	
	$showcaption 			= $params->get('showcaption', 0);
	$color_des_box 			= $params->get('color_des_box', "#000");
	$color_des_text 		= $params->get('color_des_text', "#fff");
	$effect 				= $params->get('effect', 0);
	$autoplay 				= $params->get('autoplay', 0);
	$animationSpeed 		= $params->get('animationSpeed', "800");
	$pausetime 				= $params->get('pausetime', "3000");
    //$option = (array) $params->get('animation')->$style;
    if(  is_array( $helper->error() )  )
    {
        JFactory::getApplication()->enqueueMessage( implode('<br /><br />', $helper->error()) , 'error');
    } else {
        if( file_exists($layoutoverwritepath.'/view.php') )
        {
            require(JModuleHelper::getLayoutPath($module_name, $layoutoverwritepath.'/view.php') );   
        } else {
            require(JModuleHelper::getLayoutPath($module_name, $style.'/view') );   
        }

        $helper->setAssets($document, $style);
}