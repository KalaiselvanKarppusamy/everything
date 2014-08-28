<?php
namespace Album\Model;


use Zend\InputFilter\InputFilter;
class Album
{
	public $id;
	public $artist;
	public $title;
	
	public function exchangeArray($data)
	{
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
		$this->title = (!empty($data['title'])) ? $data['title'] : null;
	}
	
	public function setInputFilter(InputFilter $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	public function getInputFilter()
	{
		if (!$this->inputFilter)
		{
			$inputFilter = new InputFilter();
			
			$inputFilter->add(array(
				'name' => 'id',
				'required' => true,
				'filters' => array(
					array('name' => 'Int'),
				),
			));
			
			$inputFilter->add(array(
					'name' => 'artist',
					'required' => true,
					'filters' => array(
						array('name' => 'StringTags'),
						array('name' => 'StringTrim'),
					),
					'validaors' => array(
						array(
							'name' => 'StringLength',
							'options' => array(
								
							),
						),
					),
					
			));
		}
	}
}