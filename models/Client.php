<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $patronymic
 * @property string|null $passport
 * @property string|null $address
 * @property string|null $city
 * @property int|null $age
 * @property string|null $gender
 * @property-read string|null $fio
 *
 * @property Sales[] $sales
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'patronymic'], 'required'],
            [['passport', 'address'], 'string'],
            [['age'], 'integer', 'min' => 14],
            [['last_name', 'first_name', 'patronymic', 'city'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['gender'], 'in', 'range' => array_keys(self::getGenders())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'patronymic' => 'Отчество',
            'passport' => 'Паспорт',
            'address' => 'Адрес',
            'city' => 'Город',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'fio' => 'ФИО',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['client_id' => 'id']);
    }

    public static function getGenders()
    {
        return [
            'М' => 'Мужской',
            'Ж' => 'Женский',
        ];
    }

    public static function getDropdown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'fio');
    }
}
