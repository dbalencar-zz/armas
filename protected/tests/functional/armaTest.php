<?php

class armaTest extends WebTestCase
{
	public $fixtures=array(
		'armas'=>'arma',
	);

	public function testShow()
	{
		$this->open('?r=arma/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=arma/create');
	}

	public function testUpdate()
	{
		$this->open('?r=arma/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=arma/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=arma/index');
	}

	public function testAdmin()
	{
		$this->open('?r=arma/admin');
	}
}
