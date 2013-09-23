<?php

class cautelaTest extends WebTestCase
{
	public $fixtures=array(
		'cautelas'=>'cautela',
	);

	public function testShow()
	{
		$this->open('?r=cautela/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=cautela/create');
	}

	public function testUpdate()
	{
		$this->open('?r=cautela/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=cautela/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=cautela/index');
	}

	public function testAdmin()
	{
		$this->open('?r=cautela/admin');
	}
}
