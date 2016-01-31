<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $age
 *
 * @property Order[] $orders
 */
class Client extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'client';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['user_id', 'age'], 'integer'],
			[['name'], 'string', 'max' => 12],
			['age', 'compare', 'compareValue' => 18, 'operator' => '>'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'User ID',
			'name' => 'Name',
			'age' => 'Age',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOrders()
	{
		return $this->hasMany(Order::className(), ['client_id' => 'id']);
	}

	/**
	 * Возвращает десять последних заявок за сегодня
	 * @return \yii\db\ActiveQuery
	 */
	public function getTenTodayOrders()
	{
		return $this->hasMany(Order::className(), ['client_id' => 'id'])
			->having('DATE(date) = DATE(NOW())')->limit(10);
	}

	public function extraFields()
	{
		return [
			'isactive',
			'isvip',
			'isactivetoday',
		];
	}


	/**
	 * Определяет кто имел минимум одну заявку
	 * @return bool
	 */
	public function getIsActive()
	{
		return (count($this->orders) > 0);
	}

	/**
	 * Определяет у кого минимум пять заявок
	 * @return bool
	 */
	public function getIsVIP()
	{
		return (count($this->orders) > 5);
	}

	/**
	 * Определяет, кто сделал заявку сегодня
	 * @return bool
	 */
	public function getIsActiveToday()
	{
		foreach ($this->orders as $order)
			if ($order->isOrderedToday()) return true;
		return false;
	}
}
