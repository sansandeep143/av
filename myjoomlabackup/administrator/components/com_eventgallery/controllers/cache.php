<?php
/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2013 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport( 'joomla.application.component.controllerform' );

require_once(__DIR__.'/../controller.php');

class EventgalleryControllerCache extends JControllerForm
{

    /**
     * The root folder for the physical images
     *
     * @var string
     */

    protected $default_view = 'cache';

    public function __construct($config = array())
    {

        parent::__construct($config);
    }

	public function getModel($name = 'Cache', $prefix ='EventgalleryModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }

    /**
     * just cancels this view
     */
	public function cancel($key = NULL) {
		$this->setRedirect( 'index.php?option=com_eventgallery&view=eventgallery');
	}

    /**
     * starts the deletion.
     *
     * @param bool $cachable
     * @param array $urlparams
     */
    public function process($cachable = false, $urlparams = array()) {
        JSession::checkToken();

        $folder = trim(JRequest::getString('images',''));
        $picasa = JRequest::getString('picasa', '');
        $general = JRequest::getString('general', '');


        if (strlen($folder)>0) {
            $this->getModel()->clearImageCacheFolder($folder);            
            echo '["'.htmlentities($folder, ENT_QUOTES, "UTF-8").'"]';
        }

        if (strlen($picasa)>0) {
            $this->getModel()->clearPicasaCacheFolder();
            echo '["picasa"]';
        }

        if (strlen($general)>0) {
            $this->getModel()->clearGeneralCacheFolder();
            echo '["general"]';
        }
        
    }


}
