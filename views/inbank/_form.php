<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="request-status-in-work">--><?//=$states[$model->state_id]?><!--</div>-->


<div class="inbank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $client_string = $model->insalon->client_tname
            . ' ' . $model->insalon->client_fname
            . ' ' . $model->insalon->client_sname
            . ' (' . $model->insalon->client_bdate . ')';

    $client_pasp_string = $model->insalon->client_pserial
        . ' ' . $model->insalon->client_pdate
        . ' ' . $model->insalon->client_pplace;

    $salon_comment_string = $model->insalon->salon_desc;

    $avto_string = $model->insalon->car_model
            . ' ' . $model->insalon->car_year . ' года';

        $price_string = number_format(
                $model->insalon->car_price,2,',',' ' )
            .' руб'.
        ' ( первоначальный взнос: '.
            number_format($model->insalon->down_payment,2,',',' ')
            .' )';

        $eq_string = $model->insalon->equipment_desc
            . ' стоимостью ' .
            number_format($model->insalon->equipment_cost,2,',',' ' )
            . ' руб';
    $style1 = ['disabled'=>'disabled', 'style'=>'width:100%;'];

    ?>


    <?= Html::label('Клиент: ')
        . HTML::textInput('client_string',$client_string, $style1) ?><br>

    <?= Html::label('Паспорт: ')
        . HTML::textInput('client_pasp_string',$client_pasp_string, $style1) ?><br>

    <?= Html::label('Авто: ')
        . HTML::textInput('avto_string',$avto_string, $style1) ?><br>
    <?= Html::label('Стоимость: ')
        . HTML::textInput('pr_string',$price_string, $style1) ?><br>
    <?= Html::label('Оборудование: ')
        . HTML::textInput('eq_string',$eq_string, $style1) ?><br>

    <?= $form->field($model, 'credit_amount') ?>
    <?= $form->field($model, 'credit_rate') ?>
    <?= $form->field($model, 'credit_months') ?>


    <?= Html::label('Примечения салона: ')
    . HTML::textInput('eq_string',$salon_comment_string, $style1) ?><br>


    <?= $form->field($model, 'active')->checkbox(); ?>

    <?= $form->field($model, 'state_id')
        ->dropDownList($states)
        ->label('Состояние' )
    ?>

    <?= $form->field($model, 'state_desc')->textInput(['maxlength' => true])
        ->label('Примечания банка') ?>

<!--    --><?//= $form->field($model, 'b1')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'b2')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'b3')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'b4')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'b5')->textInput(['maxlength' => true]) ?>



    <?= Html::label('Изменено: ')
        . HTML::textInput('changed', $model->changed, $style1) ?><br>

<!--    --><?//= $form->field($model, 'changed')->textInput(['disabled'=>'disabled'])
//        ->label('Изменено') ?><br>

<!--    пока скроем, можно админам открыть-->
<!--    --><?//= $form->field($model, 'changed_by_user_id')->textInput(['disabled'=>'disabled'])
//        ->label('Изменено пользователем') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            'Сохранить' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
