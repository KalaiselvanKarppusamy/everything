<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Album for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class IndexController extends AbstractActionController
{
	protected $albumTable;
	
    public function indexAction()
    {
    	$albums = $this->getAlbumTable()->fetchAll();    	
    	return new ViewModel(array('albums' => $albums));    	
    }
    
    public function addAction()
    {
    	return array();
    }
    
    public function editAction()
    {
    	return array();
    }
    
    public function deleteAction()
    {
    	return array();
    }
    
    public function getAlbumTable()
    {
    	if (! $this->albumTable)
    	{
    		$sm = $this->getServiceLocator();
    		$this->albumTable = $sm->get('Album\Model\AlbumTable');
    	}
    	return $this->albumTable;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
