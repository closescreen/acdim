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

        $avto_string = $model->insalon->car_model
            . ' ' . $model->insalon->car_year . ' года';

        $price_string = $model->insalon->car_price .' руб';

        $eq_string = $model->insalon->equipment_desc
            . ' стоимостью ' . $model->insalon->equipment_cost . ' руб';
    $style1 = ['disabled'=>'disabled', 'style'=>'width:100%;'];

    ?>


    <?= Html::label('Клиент: ')
        . HTML::textInput('client_string',$client_string, $style1) ?><br>
    <?= Html::label('Авто: ')
        . HTML::textInput('avto_string',$avto_string, $style1) ?><br>
    <?= Html::label('Стоимость: ')
        . HTML::textInput('pr_string',$price_string, $style1) ?><br>
    <?= Html::label('Оборудование: ')
        . HTML::textInput('eq_string',$eq_string, $style1) ?><br>


    <?= Html::label('Состояние: ')
    . HTML::textInput('state_name',$states[$model->state_id] , $style1) ?><br>

<!--    --><?//= $form->field($model, 'state_id')
//        ->dropDownList($states)
//        ->label('Состояние' )
//    ?>

    <?= Html::label('Примечания')
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
