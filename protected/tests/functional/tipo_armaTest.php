<?php

class tipo_armaTest extends WebTestCase
{
	public $fixtures=array(
		'tipo_armas'=>'tipo_arma',
	);

	public function testShow()
	{
		$this->open('?r=tipo_arma/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tipo_arma/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tipo_arma/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tipo_arma/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tipo_arma/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tipo_arma/admin');
	}
}
