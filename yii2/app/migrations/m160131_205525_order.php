<?php

use yii\db\Migration;

class m160131_205525_order extends Migration
{
	private $tableName = 'order';

	public function up()
	{
		$this->createTable(
			$this->tableName,
			[
				'id' => $this->primaryKey(),
				'title' => $this->string(12),
				'client_id' => $this->integer(11),
				'date' => $this->dateTime(),
			]);

		$this->batchInsert($this->tableName, ['title', 'client_id', 'date'], [
			['Order1', 100, '2016-01-01'],
			['Order2', 100, '2016-01-01'],
			['Order3', 100, '2016-01-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order4', 101, '2016-02-01'],
			['Order5', 101, '2016-02-01'],
			['Order7', 102, '2016-01-10'],
			['Order8', 102, '2016-01-11'],
			['Order9', 102, '2016-01-26'],
			['Order10', 102, '2016-01-10'],
			['Order11', 102, '2016-01-11'],
			['Order12', 102, '2016-01-26'],
		]);
	}

	public function down()
	{
		$this->dropTable($this->tableName);
	}

}
