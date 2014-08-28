<?php
namespace ChecklistTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class TaskControllerTest extends AbstractHttpControllerTestCase
{
	protected $traceError = true;
	
 	public function setUp()
    {
    	//$dir = realpath(__DIR__ . '/../../../'.'config/application.config.php');
    	//echo $dir;
        //application path should not be static
        $this->setApplicationConfig(
        		//include '/vagrant/zend/workspace2/integration/config/application.config.php'
	       //include '/var/lib/jenkins/jobs/integration/workspace/config/application.config.php'
		   include '/var/lib/jenkins/jobs/testing-everything-new/workspace/config/application.config.php'
        );
        parent::setUp();        
    }
    
    public function testIndexActionCanBeAccessed()
    {  
    	$this->dispatch('/task');
    	$this->assertResponseStatusCode(200);
    
    	$this->assertModuleName('Checklist');
    	$this->assertControllerName('Checklist\Controller\Task');
    	$this->assertControllerClass('TaskController');
    	$this->assertMatchedRouteName('checklist');
    }
}
