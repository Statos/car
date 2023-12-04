<?php

use app\models\Sales;
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SalesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продажу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'car_id',
                'value' => 'car.name',
                'filter' => \app\models\Car::getDropdown()
            ],
            [
                'attribute' => 'brand_id',
                'value' => 'car.brand.name',
                'filter' => \app\models\Brand::getDropdown()
            ],
            [
                'attribute' => 'client_id',
                'value' => 'client.fio',
                'filter' => \app\models\Client::getDropdown()
            ],
            [
                'attribute' => 'employee_id',
                'value' => 'employee.fio',
                'filter' => \app\models\Employee::getDropdown()
            ],
            'date:date',
            [
                'class' => ActionColumn::className(),
                'template' => Helper::filterActionColumn('{view}{update}{delete}'),
            ],
        ],
    ]); ?>


</div>
