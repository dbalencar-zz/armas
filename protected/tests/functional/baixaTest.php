<?php

class baixaTest extends WebTestCase
{
	public $fixtures=array(
		'baixas'=>'baixa',
	);

	public function testShow()
	{
		$this->open('?r=baixa/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=baixa/create');
	}

	public function testUpdate()
	{
		$this->open('?r=baixa/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=baixa/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=baixa/index');
	}

	public function testAdmin()
	{
		$this->open('?r=baixa/admin');
	}
}
