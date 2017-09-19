<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InsalonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insalon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'salon_id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'created_by_user_id') ?>

    <?php // echo $form->field($model, 'changed') ?>

    <?php // echo $form->field($model, 'changed_by_user_id') ?>

    <?php // echo $form->field($model, 'client_fname') ?>

    <?php // echo $form->field($model, 'client_sname') ?>

    <?php // echo $form->field($model, 'client_tname') ?>

    <?php // echo $form->field($model, 'client_bdate') ?>

    <?php // echo $form->field($model, 'client_phone') ?>

    <?php // echo $form->field($model, 'car_price') ?>

    <?php // echo $form->field($model, 'down_payment') ?>

    <?php // echo $form->field($model, 'equipment_cost') ?>

    <?php // echo $form->field($model, 'equipment_desc') ?>

    <?php // echo $form->field($model, 'car_model') ?>

    <?php // echo $form->field($model, 'car_year') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 's2') ?>

    <?php // echo $form->field($model, 's3') ?>

    <?php // echo $form->field($model, 's4') ?>

    <?php // echo $form->field($model, 's5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
