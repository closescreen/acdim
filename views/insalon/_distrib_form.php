<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="distrib-form">

    <? if($model->active): ?>

        <?php $form = ActiveForm::begin(['action'=>['distrib_to_banks']]); ?>

        <?= $form->field($model, 'id')->textInput() ?>

         <div class="form-group">
            <?= Html::submitButton( 'Отослать во все банки' ) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <? endif; ?>


</div>
