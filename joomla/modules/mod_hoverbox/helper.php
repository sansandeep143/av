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
require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
$helper = JPATH_SITE.DS.'media'.DS.'plg_jblibrary'.DS.'helpers'.DS.'image.php';
if (file_exists($helper)){
	require_once($helper);
} else {
	echo 'JbLibrary plugin is not installed! Please install it.';
}
class modhoverBoxHelper
{
	function getList($params, $id)
	{
		// Import libraries
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		$directory = $params->get('directory', '/images/stories');
		//Remove Slashes from directory
		$directory = ltrim($directory,'/');
		$directory = rtrim($directory,'/');
		$subfolderDisplay = $params->get('subfolderDisplay', 0);
		$output = $params->get('output', 3); // Selects the type of layout for the gallery
		$link = $params->get('link',1);
		$details = $params->get('details', '1');
		$rightMargin =  str_replace('px', '', $params->get('right_margin','0'));
		// PrettyPhoto Settings
		$prettyPhoto = $params->get('prettyPhoto','1');
		$padding = str_replace('px', '', $params->get('padding','40'));
		$resize = $params->get('resize','true');
		$theme = $params->get('theme','dark_rounded');
		$prettyBoxTitle = $params->get('prettyBoxTitle','false');
		$opacity = $params->get('opacity','0.6');
		$prettyBoxSpeed = $params->get('prettyBoxSpeed','normal');
		// Image Size and container, remove px if user entered
		$option = $params->get('option', 'crop');
		$img_width = str_replace('px', '', $params->get('img_width','150'));
		$img_height = str_replace('px', '', $params->get('img_height','100'));
		$height = str_replace('px', '', $params->get('height','200'));
		// list of filetypes you want to show
		$allowed_types = '\.png$|\.gif$|\.jpg$|\.$';
		// list of filetypes you want to exclude
		$exclude = array('.svn', 'CVS','.DS_Store','__MACOSX');
		if ((strpos(JPATH_ROOT, '/'))===FALSE){//windows
			$directory = str_replace('/', '\\', $directory);
			$path = JPATH_ROOT.'\\'.$directory;
		} else {//linux
			$directory = str_replace('\\', '/', $directory);
			$path = JPATH_ROOT.'/'.$directory;
		}
		//get list of images from dir
		$images = JFolder::files($path, $allowed_types, false, true, $exclude);
		//we create the array
		$items = array();
		//create an array of items for template
		foreach ($images as $image)
		{
			//windows or linux, find local
			$local_image = str_replace('\\', '/', $image);
			$pos = strpos($local_image, '/images');
			$local_image = substr_replace($local_image, '', 0, $pos);
			// remove file path
			$file = JFile::getName($image);
			// remove file extension
			$name = JFile::stripExt($file);
			// remove root path & File name
			$names = explode('-', $name);
			// Creates new variables from the file name
			switch ($details){
				case "1":
					$title = (!empty($names[0]))? $names[0] : '';
					$description = "";
					$date = '';
					$author = '';
					$articleid = '';
					$itemid = '';
				break;
				default:
					$title = (!empty($names[0]))? $names[0] : '';
					$description = (!empty($names[1]))? $names[1] : '';
					$date = '';
					$author = '';
					$articleid = '';
					$itemid = '';
				break;
			}
			// Link Behaviour
			switch ($link){
				// No Link
				case "0":
				$lightbox = '';
				$openlink = '<a href="#">';
				$closelink = '</a>';
				break;
				// Pretty Photo
				case  "1":
				$lightbox = 'rel="prettyPhoto'.$id.'[gallery]"';
				$openlink ='<a href="'.JURI::base(true).$local_image.'" '.$lightbox.' title="'.$title.' ">';
				$closelink = '</a>';
				break;
				// Same Window
				case  "2":
				$lightbox = '';
				$openlink ='<a href="'.JURI::base(true).$local_image.'">';
				$closelink = '</a>';
				break;
				// New Window
				case "3":
				$lightbox = '';
				$openlink ='<a href="'.JURI::base(true).$local_image.'" target="_blank">';
				$closelink = '</a>';
				break;
				// Default
				default:
				$lightbox = '';
				$openlink = '';
				$closelink = '';
				break;
			}
			$new_image = JURI::base(true).$local_image;
			if (class_exists('ZenImageResizer'))
			{
				$resized_image =  ZenImageResizer::getResizedImage($new_image, $img_width, $img_height, $option);
			}
			else
			{
				$resized_image =  resizeImageHelper::getResizedImage($new_image, $img_width, $img_height, $option);
			}
			// Output options for the gallery
			switch ($output){
				// No Details
				case "1":
				// Original Image
				$item = '<div class="hoverBoxGallery'.$id.'">'.$openlink.'<img class="hoverBox" src="'.$resized_image.'" title="'.$title.' - '.$description.'" />'.$closelink.'</div>';
				break;
				// Resized Image
				case "0":
					$item = '<div class="hoverBoxGallery'.$id.'">'.$openlink.'<img class="hoverBox" src="'.$new_image.'" title="'.$title.' - '.$description.'" />'.$closelink.'</div>';
				break;
				default :
				$item = '<div class="hoverBoxGallery'.$id.'">'.$openlink.'<img class="hoverBox" src="'.$resized_image.'" title="'.$title.' - '.$description.'" />'.$closelink.'</div>';
				break;
			}
			$items[] = $item;
		}
        return $items;
	}
}
