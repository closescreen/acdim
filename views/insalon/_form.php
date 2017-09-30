<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\i18n\Formatter;


/* @var $this yii\web\View */
/* @var $model app\models\Insalon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insalon-form">

<!--    --><?php
//       $options = ['class' => []];
//       if (!$model->active) {
//           Html::addCssClass($options, 'inactual');
//       }
//    ?>
<!--    --><?//= Html::beginTag('div', $options) ?>
    <?= Html::beginTag('div') ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'active'   )->checkbox() ?>

    <?= $form->field($model, 'client_tname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_bdate')->textInput() ?>

<!--    --><?php
// не смог установить
    //    echo DatePicker::widget([
//    'model' => $model,
//    'attribute' => 'from_date',
//    //'language' => 'ru',
//    //'dateFormat' => 'yyyy-MM-dd',
//    ]);

    ?>

    <?= $form->field($model, 'client_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_price')->textInput() ?>

    <?= $form->field($model, 'down_payment')->textInput() ?>

    <?= $form->field($model, 'equipment_cost')->textInput() ?>

    <?= $form->field($model, 'equipment_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_year')->textInput() ?>

    <?= $form->field($model, 's1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's5')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= Html::endTag('div')?>

</div>
