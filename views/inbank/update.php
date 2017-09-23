<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */

$this->title = 'Заявка №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Заявка #'.$model->id;
?>
<div class="inbank-update">

    <?= $this->render('_form', [
        'model' => $model,
        'states'=>$states,
    ]) ?>

</div>

<!-- Попробуй вместо рендера _form:
/*
 DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'salon_id',
        'created:datetime',
        'client_tname',
        'client_fname',
        'client_sname',
        'client_bdate',
        'client_phone',
        'car_price',
        'down_payment',
        'equipment_cost',
        'equipment_desc',
        'car_model',
        'car_year',
        's1',
        's2',
        's3',
        's4',
        's5',
        'created_by_user_id',
        'changed:datetime',
        'changed_by_user_id',
        'active',
    ],


] )
*/
-->

<div class="message-list">

    <?= $this->render('_messages', [
        'messages' => $messages,
        //'messageDataProvider'=>$messageDataProvider,
        'inbank_model' => $model,
    ]) ?>

</div>

<div class="answer-form">
    <? Url::remember(); ?>
    <?= $this->render('_answer_form',['inbank_model'=>$model]) ?>

</div>