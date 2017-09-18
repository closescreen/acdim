<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $f = ActiveForm::begin(); ?>
<?= $f->field($record,'id')->hiddenInput()->label(false) ?>
<?= $f->field($record,'username')->label('логин'); ?>
<?= $f->field($record, 'password')->label('пароль') ?>
<?= $f->field($record, 'fio')->label('ФИО') ?>
<?= $f->field($record, 'active')->checkbox() ?>
<?= $f->field($record, 'org_id')->dropDownList($orgs) ?>
<?= Html::submitButton('Сохранить') ?>

<?php ActiveForm::end(); ?>


