
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<? if($name): ?><p> Вы ввели имя <b><?=$name?></b> и email <b><?=$email?></b> <?endif?>
<?php $f = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $f->field($form, 'name')?>
    <?= $f->field($form, 'email')?>
    <?= $f->field($form, 'file')->fileInput()?>
    <?= Html::submitButton( 'Отравить' ); ?>
<?php ActiveForm::end(); ?>