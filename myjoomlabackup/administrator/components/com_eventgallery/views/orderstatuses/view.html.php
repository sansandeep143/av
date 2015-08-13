<?php 
/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2013 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;



jimport( 'joomla.application.component.view');
jimport( 'joomla.html.pagination');
jimport( 'joomla.html.html');


class EventgalleryViewOrderstatuses extends EventgalleryLibraryCommonView
{    

    protected $items;
    protected $pagination;
    protected $state;
    /**
     * Display the view
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        EventgalleryHelpersEventgallery::addSubmenu('orderstatuses');      
        $this->addToolbar();
        $this->sidebar = JHtmlSidebar::render();
        return parent::display($tpl);
    }

    protected function addToolbar() {
        JToolbarHelper::title(   JText::_( 'COM_EVENTGALLERY_ORDERSTATUSES' ), 'generic.png' );            
        JToolbarHelper::addNew('orderstatus.add');
        JToolbarHelper::editList('orderstatus.edit');
        JToolbarHelper::deleteList('Remove all selected Events?','orderstatuses.delete','Remove');
    }

}