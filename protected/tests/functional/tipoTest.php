<?php

class tipoTest extends WebTestCase
{
	public $fixtures=array(
		'tipos'=>'tipo',
	);

	public function testShow()
	{
		$this->open('?r=tipo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tipo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tipo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tipo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tipo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tipo/admin');
	}
}
