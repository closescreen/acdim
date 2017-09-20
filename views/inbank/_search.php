<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InbankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inbank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'insalon_id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'changed') ?>

    <?php // echo $form->field($model, 'changed_by_user_id') ?>

    <?php // echo $form->field($model, 'state_id') ?>

    <?php // echo $form->field($model, 'state_desc') ?>

    <?php // echo $form->field($model, 'b1') ?>

    <?php // echo $form->field($model, 'b2') ?>

    <?php // echo $form->field($model, 'b3') ?>

    <?php // echo $form->field($model, 'b4') ?>

    <?php // echo $form->field($model, 'b5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
