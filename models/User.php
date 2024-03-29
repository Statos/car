<?php

namespace app\models;

class User extends \mdm\admin\models\User
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['username', 'email'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],

            ['username', 'unique', 'message' => 'Данный логин уже занят'],
            ['email', 'unique', 'message' => 'Данный email уже зарегистрирован'],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'retypePassword' => 'Повтор пароля',
            'status' => 'Статус',
            'statusName' => 'Статус',
            'created_at' => 'Дата регистрации',
            'updated_at' => 'Дата обновления',
        ];
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE => 'Неактивный',
        ];
    }

    public function getStatusName()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }
}
