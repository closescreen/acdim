<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inbank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'insalon_id')->textInput() ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'changed')->textInput() ?>

    <?= $form->field($model, 'changed_by_user_id')->textInput() ?>

    <?= $form->field($model, 'state_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
