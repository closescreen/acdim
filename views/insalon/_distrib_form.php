<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="distrib-form">

    <? if($model->active): ?>

        <?php $form = ActiveForm::begin(['action'=>['distrib_in_banks']]); ?>

        <?= $form->field($model, 'salon_id')->textInput() ?>

         <div class="form-group">
            <?= Html::submitButton( 'Отослать во все банки' ) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <? endif; ?>


</div>
