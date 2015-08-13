<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2014 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/


defined('_JEXEC') or die;

require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');
require_once (JPATH_SITE.'/components/com_k2/helpers/utilities.php');

class ModSPK2FeaturedSliderHelper
{
	public static function getItems(&$params)
	{

		jimport('joomla.filesystem.file');
		$mainframe = JFactory::getApplication();
		$limit = $params->get('itemCount', 5);
		$cid = $params->get('category_id', NULL);
		$componentParams = JComponentHelper::getParams('com_k2');
		
		$user = JFactory::getUser();
		$db = JFactory::getDBO();

		$jnow = JFactory::getDate();
		$now =  $jnow->toSql();
		$nullDate = $db->getNullDate();

		$query = "SELECT i.*,";
		$query .= "c.name AS categoryname,c.id AS categoryid, c.alias AS categoryalias, c.params AS categoryparams";
		$query .= " FROM #__k2_items as i RIGHT JOIN #__k2_categories c ON c.id = i.catid";
		$query .= " WHERE i.published = 1 AND i.access IN(".implode(',', $user->getAuthorisedViewLevels()).") AND i.trash = 0 AND c.published = 1 AND c.access IN(".implode(',', $user->getAuthorisedViewLevels()).")  AND c.trash = 0";
		$query .= " AND ( i.publish_up = ".$db->Quote($nullDate)." OR i.publish_up <= ".$db->Quote($now)." )";
		$query .= " AND ( i.publish_down = ".$db->Quote($nullDate)." OR i.publish_down >= ".$db->Quote($now)." )";

		if ($params->get('catfilter'))
		{

			if (!is_null($cid))
			{
				if (is_array($cid))
				{
					$itemListModel = K2Model::getInstance('Itemlist', 'K2Model');
					$categories = $itemListModel->getCategoryTree($cid);
					$sql = @implode(',', $categories);
					$query .= " AND i.catid IN ({$sql})";
				}
				else
				{
					$itemListModel = K2Model::getInstance('Itemlist', 'K2Model');
					$categories = $itemListModel->getCategoryTree($cid);
					$sql = @implode(',', $categories);
					$query .= " AND i.catid IN ({$sql})";
				}
			}
		}

		$query .= " AND i.featured = 1";
		$query .= " ORDER BY i.created DESC";

		$db->setQuery($query, 0, $limit);
		$items = $db->loadObjectList();

		$model = K2Model::getInstance('Item', 'K2Model');

		if (count($items))
		{

			foreach ($items as $item)
			{
				$item->event = new stdClass;

				//Clean title
				$item->title = JFilterOutput::ampReplace($item->title);

				//Images
				$date = JFactory::getDate($item->modified);
				$timestamp = '?t='.$date->toUnix();

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_XS.jpg'))
				{
					$item->imageXSmall = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_XS.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageXSmall .= $timestamp;
					}
				}

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_S.jpg'))
				{
					$item->imageSmall = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_S.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageSmall .= $timestamp;
					}
				}

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_M.jpg'))
				{
					$item->imageMedium = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_M.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageMedium .= $timestamp;
					}
				}

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_L.jpg'))
				{
					$item->imageLarge = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_L.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageLarge .= $timestamp;
					}
				}

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_XL.jpg'))
				{
					$item->imageXLarge = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_XL.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageXLarge .= $timestamp;
					}
				}

				if (JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$item->id).'_Generic.jpg'))
				{
					$item->imageGeneric = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_Generic.jpg';
					if ($componentParams->get('imageTimestamp'))
					{
						$item->imageGeneric .= $timestamp;
					}
				}

				$image = 'image'.$params->get('itemImgSize', 'Small');
				if (isset($item->$image)) {
					$item->image = $item->$image;
				} else {
					$item->image = JURI::base(true) . '/modules/mod_sp_k2_featured_slider/assets/images/no-image.png';
				}
				//Read more link
				$item->link = urldecode(JRoute::_(K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias), $item->catid.':'.urlencode($item->categoryalias))));

				//Category link
				if ($params->get('itemCategory'))
					$item->categoryLink = urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($item->catid.':'.urlencode($item->categoryalias))));

				// Introtext
				$item->text = '';
				if ($params->get('itemIntroText'))
				{
					// Word limit
					if ($params->get('itemIntroTextWordLimit'))
					{
						$item->text .= K2HelperUtilities::wordLimit($item->introtext, $params->get('itemIntroTextWordLimit'));
					}
					else
					{
						$item->text .= $item->introtext;
					}
				}

				$item->introtext = $item->text;

				$rows[] = $item;
			}

			return $rows;

		}

	}
}
