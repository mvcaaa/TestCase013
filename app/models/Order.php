<?php

namespace app\models;

use DateTime;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $title
 * @property integer $client_id
 * @property string $date
 *
 * @property Client $client
 */
class Order extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'order';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['client_id'], 'integer'],
			[['date'], 'safe'],
			[['title'], 'string', 'max' => 12]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'client_id' => 'Client ID',
			'date' => 'Date',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getClient()
	{
		return $this->hasOne(Client::className(), ['id' => 'client_id']);
	}

	/**
	 * Определяет, был ли сделан заказ сегодня.
	 * Может быть не совсем оптимально - сравниваются две строки.
	 * @return bool
	 */
	public function isOrderedToday()
	{
		return ((new DateTime($this->date))->format("Y-m-d") == (new DateTime())->format("Y-m-d"));
	}
}
