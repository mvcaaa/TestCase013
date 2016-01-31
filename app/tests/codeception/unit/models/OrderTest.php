<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 01.02.2016 / 2:25
 */

namespace app\tests\codeception\unit\models;


use yii\codeception\TestCase;
use app\models\Order;
use Codeception\Specify;


class OrderTest extends TestCase
{

	public function testisOrderedToday()
	{
		$model = new Order([
			'id' => '1',
			'title' => 'Order1',
			'client_id' => '100',
			'date' => '2016-01-01 00:00:00',
		]);
		expect('Order is not ordered today', $model->isOrderedToday())->false();

		$model = new Order([
			'id' => '1',
			'title' => 'Order1',
			'client_id' => '100',
			'date' => date('Y-m-d H:m')
		]);
		expect('Order is ordered today', $model->isOrderedToday())->true();
	}
}