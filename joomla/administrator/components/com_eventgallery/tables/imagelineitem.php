<?php
/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2013 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');


class TableImagelineitem extends JTable
{
    /**
     * Constructor
     * @param JDatabaseDriver $db
     */
    function __construct( &$db ) {
		parent::__construct('#__eventgallery_imagelineitem', 'id', $db);
	}
}
