<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="inbank-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'state_id')->dropDownList($states) ?>

    <?= $form->field($model, 'state_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'changed')->textInput(['disabled'=>'disabled']) ?>

    <?= $form->field($model, 'changed_by_user_id')->textInput(['disabled'=>'disabled']) ?>


    <?php ActiveForm::end(); ?>

</div>
