<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Org_bindings */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $banks = \yii\helpers\ArrayHelper::map( $orgs_model->find()
        ->where(['org_type_id'=>'bank','active'=>1])->all(), 'id','name');

    $salons = \yii\helpers\ArrayHelper::map( $orgs_model->find()
        ->where(['org_type_id'=>'salon','active'=>1])->all(), 'id','name');

?>

<div class="org-bindings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

<!--    --><?//= $form->field($model, 'bank_id')->textInput() ?>
    <?= $form->field($model, 'bank_id')->dropDownList($banks) ?>


<!--    --><?//= $form->field($model, 'salon_id')->textInput() ?>
    <?= $form->field($model, 'salon_id')->dropDownList($salons) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
