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
 * @property mixed todayOrders
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
	 * Возвращает десять последних заявок за сегодня
	 * @return \yii\db\ActiveQuery
	 */
	public function getTenTodayOrders()
	{
		return $this->getTodayOrders()->limit(10);
	}

	/**
	 * Возвращает сегодняшние заказы
	 * @return \yii\db\ActiveQuery
	 */
	public function getTodayOrders()
	{
		return $this->getOrders()->having('DATE(date) = DATE(NOW())');
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOrders()
	{
		return $this->hasMany(Order::className(), ['client_id' => 'id']);
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
		return (count($this->todayOrders) ? true : false);
	}
}
