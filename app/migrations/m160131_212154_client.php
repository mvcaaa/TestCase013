<?php

use yii\db\Migration;

class m160131_212154_client extends Migration
{

	private $tableName = 'client';

	public function up()
	{
		$this->createTable(
			$this->tableName,
			[
				'id' => $this->primaryKey(),
				'user_id' => $this->integer(11),
				'name' => $this->string(12),
				'age' => $this->smallInteger(2),
			]);

		$this->batchInsert($this->tableName, ['id', 'user_id', 'name', 'age'], [
			['100', '100', 'Natasha', '14'],
			['101', '101', 'Marina', '16'],
			['102', '102', 'Vera', '37'],
			['103', '103', 'Bob', '28'],
		]);

		$this->addForeignKey('order_client', 'order', 'client_id', 'client', 'id');


	}

	public function down()
	{
		$this->dropTable($this->tableName);
		$this->dropForeignKey('order_user', 'order');
	}

}
