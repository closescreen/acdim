<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?= Html::beginForm(['message/create','inbank_id'=>$inbank_model->id],'post',[]) ?>

    <?= Html::hiddenInput('inbank_id',$inbank_model->id) ?>

    <?= Html::textarea('text', '');?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?= Html::endForm();?>

</div>
