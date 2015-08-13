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
defined( '_JEXEC' ) or die( 'Restricted access' );
//import the necessary class definition for formfield
jimport('joomla.html.html');
jimport('joomla.form.formfield');
class JFormFieldFolders extends JFormField
{
   protected  $type = 'Folders';
   protected function getInput()
	{
			jimport( 'joomla.filesystem.folder' );

			$attr = '';
			// Initialize some field attributes.
			$attr .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';

			// To avoid user's confusion, readonly="true" should imply disabled="true".
			if ( (string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true') {
			$attr .= ' disabled="disabled"';
			}

			$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
			$attr .= $this->multiple ? ' multiple="multiple"' : '';

			// Initialize JavaScript field attributes.
			$attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
			$filter= '.';
			$exclude = array('.svn', 'CVS','.DS_Store','__MACOSX');
			$path = JPATH_ROOT.DS.'images';
			//get list of image dirs
			$folders = JFolder::folders($path, $filter, true, true, $exclude);
			//if were on windows or local server we replace the DS
			$path = str_replace('\\', '/', $path);
			//find start of local url
			$pos = strpos($path, '/images');
			//remove root path
			$local_image = substr_replace($path, '', 0, $pos);
			$id = '/images';
			$title = '/images'.'/';
			$options =array();
			$options[] = JHTML::_('select.option', $id, $title, 'id', 'title');
			foreach($folders as $folder){
				//if were on windows or local server we replace the DS
				$folder = str_replace('\\', '/', $folder);
				//find start of local url
				$pos = strpos($folder, '/images');
				//remove root path
				$local_image = substr_replace($folder, '', 0, $pos);
				$id = $local_image;
				$title = $local_image.'/';
				$options[] = JHTML::_('select.option', $id, $title, 'id', 'title');
			}

  			return JHTML::_('select.genericlist',  $options, $this->name, trim($attr), 'id', 'title', $this->value );
   }

	public function getLabel() {
		return parent::getLabel();
	}
}
