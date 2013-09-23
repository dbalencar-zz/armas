<?php

class municaoTest extends WebTestCase
{
	public $fixtures=array(
		'municaos'=>'municao',
	);

	public function testShow()
	{
		$this->open('?r=municao/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=municao/create');
	}

	public function testUpdate()
	{
		$this->open('?r=municao/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=municao/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=municao/index');
	}

	public function testAdmin()
	{
		$this->open('?r=municao/admin');
	}
}
