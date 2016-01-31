<?php

namespace app\models;

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
 * @property Clients $client
 */
class Orders extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'orders';
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
		return $this->hasOne(Clients::className(), ['id' => 'client_id']);
	}
}
