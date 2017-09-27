<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php $form = ActiveForm::begin([
        'action' =>['upload/upload'],
        'options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($upload_model, 'inbank_id')->hiddenInput()->label(false) ?>

<?= $form->field($upload_model, 'file_name')->fileInput()->label(false) ?>

<?= $form->field($upload_model, 'file_desc')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end() ?>

