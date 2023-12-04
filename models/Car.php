<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property int $year
 * @property string|null $color
 * @property string|null $category
 * @property int $price
 *
 * @property Brand $brand
 * @property Sales $sales
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'name', 'year', 'price'], 'required'],
            [['brand_id'], 'integer'],
            [['year'], 'integer', 'min' => 1900],
            [['price'], 'integer', 'min' => 0],
            [['name', 'color', 'category'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Марка',
            'name' => 'Название',
            'year' => 'Год',
            'color' => 'Цвет',
            'category' => 'Категория',
            'price' => 'Цена',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasOne(Sales::class, ['car_id' => 'id']);
    }

    public static function getDropdown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', function (Car $v) {
            return $v->name . ' ' . $v->year . ' ' . $v->color;
        });
    }
}
