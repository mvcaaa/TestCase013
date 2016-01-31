<?php

use yii\db\Migration;

class m160131_212154_clients extends Migration
{

	private $tableName = 'clients';

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

		$this->addForeignKey('orders_clients', 'orders', 'client_id', 'clients', 'id');


	}

	public function down()
	{
		$this->dropTable($this->tableName);
		$this->dropForeignKey('orders_users', 'orders');
	}

}
