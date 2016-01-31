<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 01.02.2016 / 0:58
 */

namespace app\tests\codeception\unit\models;


use yii\codeception\TestCase;
use app\models\Clients;


class ClientsTest extends TestCase
{
	public function testOK()
	{
		$this->assertEquals(Clients::findOne(101)->id, 101);
		$this->assertEquals(Clients::findOne(101)->name, "Marina");
	}

	protected function setUp()
	{
		parent::setUp();
	}

	// TODO add test methods here

}