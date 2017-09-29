<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orgs */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
// $states =  ArrayHelper::map(Rstates::find()->all(), 'id', 'name');
$orgs = \yii\helpers\ArrayHelper::map($org_types_model->find()->all(), 'id','name');
?>

<div class="orgs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'org_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'org_type_id')->dropDownList( $orgs)   ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
