<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Upload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="upload-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

       <?= $form->errorSummary($model); ?>

<!--    --><?//= $form->field($model, 'active')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created_by_user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'changed')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'changed_by_user_id')->textInput() ?>

    <?= $form->field($model, 'file_name')->fileInput() ?>

<!--    --><?//= $form->field($model, 'file_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inbank_id')->hiddenInput(['value' => ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
