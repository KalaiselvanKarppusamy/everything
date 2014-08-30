<?php
namespace AlbumTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    public function setUp()
    {
        //application path should not be static
        $this->setApplicationConfig(
	      // include getcwd().'/../../../'.'config/application.config.php'
        		//include '/vagrant/zend/workspace2/integration/config/application.config.php'
        		//include '/var/lib/jenkins/jobs/integration/workspace/config/application.config.php'
				include '/var/lib/jenkins/jobs/everything/workspace/config/application.config.php'
        		//include '/vagrant/zend/workspace/everything/config/application.config.php'
        );
        parent::setUp();        
    }
    
    public function testIndexActionCanBeAccessed()
    {
    	     $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
                            ->disableOriginalConstructor()
                            ->getMock();

		    $albumTableMock->expects($this->once())
		                    ->method('fetchAll')
		                    ->will($this->returnValue(array()));
		
		    $serviceManager = $this->getApplicationServiceLocator();
		    $serviceManager->setAllowOverride(true);
		    $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock); 
    	
    	$this->dispatch('/album');
    	$this->assertResponseStatusCode(200);
    
    	$this->assertModuleName('Album');
    	$this->assertControllerName('Album\Controller\Index');
    	$this->assertControllerClass('IndexController');
    	$this->assertMatchedRouteName('album');
    }
    public function testAssertFailed()
    {
    	//$this->assertNull("not null", "expected null result");
    }
}
