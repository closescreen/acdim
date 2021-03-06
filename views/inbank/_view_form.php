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
            . ' ( ' . date('d.m.Y', strtotime($model->insalon->client_bdate)) . ' )';

    $client_pasp_string = $model->insalon->client_pserial
        . ' ' . $model->insalon->client_pdate
        . ' ' . $model->insalon->client_pplace;

    $salon_comment_string = $model->insalon->salon_desc;

    $avto_string = $model->insalon->car_model
            . ' ' . $model->insalon->car_year . ' года';

    $price_string = number_format($model->insalon->car_price,2,',',' ')
        .' руб'.
    ' ( первоначальный взнос: '.
        number_format($model->insalon->down_payment,2,',',' ')
        .' )';

    $eq_string = $model->insalon->equipment_desc
            . ' стоимостью ' .
        number_format($model->insalon->equipment_cost,2,',',' ')
        . ' руб';

    $credit_amount_string = number_format($model->credit_amount,2,',',' ');

    $credit_string = $credit_amount_string
        . ' руб. ( '. $model->credit_rate.'% на '
        . $model->credit_months.' мес )';

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

    <?= Html::label('Сумма кредита: ')
    . HTML::textInput('credit_amount', $credit_string, $style1) ?><br>

<!--    --><?//= Html::label('Процентная ставка: ')
//    . HTML::textInput('credit_rate',$model->credit_rate.'%', $style1) ?><!--<br>-->
<!---->
<!--    --><?//= Html::label('Срок кредита: ')
//    . HTML::textInput('credit_months',$model->credit_months, $style1) ?><!--<br>-->


    <?= Html::label('Примечения салона: ')
    . HTML::textInput('eq_string',$salon_comment_string, $style1) ?><br>


    <?= Html::label('Состояние: ')
    . HTML::textInput('state_name',$states[$model->state_id] , $style1) ?><br>

<!--    --><?//= $form->field($model, 'state_id')
//        ->dropDownList($states)
//        ->label('Состояние' )
//    ?>

    <?= Html::label('Примечания банка')
        . Html::textInput('state_desc', $model->state_desc, $style1) ?><br>
<!--    --><?//= $form->field($model, 'state_desc')->textInput(['maxlength' => true])
//        ->label('Примечания') ?>


    <?= Html::label('Изменено')
        . Html::textInput('changed', $model->changed, $style1) ?><br>

<!--    --><?//= $form->field($model, 'changed')->textInput(['disabled'=>'disabled'])
//        ->label('Изменено') ?>

<!--    пока скроем, можно админам открыть-->
<!--    --><?//= $form->field($model, 'changed_by_user_id')->textInput(['disabled'=>'disabled'])
//        ->label('Изменено пользователем') ?>

<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton($model->isNewRecord ?
//            'Create' : 'Update',
//            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<!--    </div>-->



    <?php ActiveForm::end(); ?>

</div>
