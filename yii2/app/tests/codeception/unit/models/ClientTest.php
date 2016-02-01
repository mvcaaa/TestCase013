<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 01.02.2016 / 0:58
 */

namespace app\tests\codeception\unit\models;


use yii\codeception\TestCase;
use app\models\Client;


class ClientTest extends TestCase
{
	public function testOK()
	{
		$this->assertEquals(Client::findOne(101)->id, 101);
		$this->assertEquals(Client::findOne(101)->name, "Marina");
	}

	public function testIsActive()
	{
		$this->assertTrue(Client::findOne(101)->isactive);
		$this->assertFalse(Client::findOne(103)->isactive);
	}

	public function testIsVIP()
	{
		$this->assertTrue(Client::findOne(102)->isvip);
		$this->assertFalse(Client::findOne(100)->isvip);
	}

	public function testIsActiveToday()
	{
		$this->assertTrue(Client::findOne(101)->isactivetoday);
		$this->assertFalse(Client::findOne(102)->isactivetoday);
	}

	public function testAge()
	{
		$testObj = new Client();
		$testObj->name = "Berta";
		$testObj->age = 10;
		$this->assertFalse($testObj->save());
		$this->assertArraySubset(["age" => "Age must be greater than \"18\"."], $testObj->firstErrors);
	}

	public function testTenTodayOrders()
	{
		$this->assertEquals(10, count(Client::findOne(101)->getTenTodayOrders()->all()));
	}

	protected function setUp()
	{
		parent::setUp();
	}

}