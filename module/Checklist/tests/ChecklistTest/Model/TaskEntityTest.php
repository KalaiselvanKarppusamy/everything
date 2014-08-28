<?php
namespace ChecklistTest\Model;

use Checklist\Model\TaskEntity;
class TaskEntityTest extends \PHPUnit_Framework_TestCase
{
	public function testTaskEntityInitialTest()
	{
		$taskEntity = new TaskEntity();
		$this->assertNotNull($taskEntity->getCreated(), "created should not be null because the value is assigned while instantiation");
	}
}

