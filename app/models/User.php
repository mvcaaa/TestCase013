<?php

namespace app\models;

use yii\base\Object;
use yii\web\IdentityInterface;

class User extends Object implements IdentityInterface
{
	private static $users = [
		'100' => [
			'id' => '100',
			'username' => 'admin',
			'password' => 'admin',
			'authKey' => 'test100key',
			'accessToken' => '100-token',
			'name' => 'Andrey',
			'age' => '37',
		],
		'101' => [
			'id' => '101',
			'username' => 'demo',
			'password' => 'demo',
			'authKey' => 'test101key',
			'accessToken' => '101-token',
			'name' => 'Natasha',
			'age' => '16',
		],
		'102' => [
			'id' => '102',
			'username' => 'demo2',
			'password' => 'demo2',
			'authKey' => 'test101key',
			'accessToken' => '101-token',
			'name' => 'Marina',
			'age' => '14',
		],
		'103' => [
			'id' => '103',
			'username' => 'demo3',
			'password' => 'demo3',
			'authKey' => 'test101key',
			'accessToken' => '101-token',
			'name' => 'Vera',
			'age' => '33',
		],
	];
	public $id;
	public $username;
	public $password;
	public $authKey;
	public $accessToken;
	public $name;
	public $age;

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		foreach (self::$users as $user)
		{
			if ($user['accessToken'] === $token)
			{
				return new static($user);
			}
		}

		return null;
	}

	/**
	 * Finds user by username
	 *
	 * @param  string $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		foreach (self::$users as $user)
		{
			if (strcasecmp($user['username'], $username) === 0)
			{
				return new static($user);
			}
		}

		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->authKey;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->authKey === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param  string $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return $this->password === $password;
	}
}
