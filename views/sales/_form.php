<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->dropDownList(\app\models\Car::getDropdown()) ?>

    <?= $form->field($model, 'client_id')->dropDownList(\app\models\Client::getDropdown()) ?>

    <?= $form->field($model, 'employee_id')->dropDownList(\app\models\Employee::getDropdown()) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
