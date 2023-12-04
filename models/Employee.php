<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $patronymic
 * @property int|null $experience
 * @property int $salary
 * @property-read string|null $fio
 *
 * @property Sales[] $sales
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'patronymic', 'salary'], 'required'],
            [['experience', 'salary'], 'integer', 'min' => 0],
            [['last_name', 'first_name', 'patronymic'], 'string', 'max' => 255],
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
            'experience' => 'Стаж',
            'salary' => 'Зарплата',
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
        return $this->hasMany(Sales::class, ['employee_id' => 'id']);
    }

    public static function getDropdown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'fio');
    }
}
