<?php
namespace AlbumTest\Model;

use Album\Model\Album;

class AlbumTest extends \PHPUnit_Framework_TestCase
{
	public function testAlbumInitialState()
	{
		$album = new Album();
		$data = array('artist' => 'test');
		$album->exchangeArray($data);
		$this->assertNotNull($album->artist, 'initially, "artist" should be null');		
	}
}