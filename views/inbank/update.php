<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inbank */

// todo: номер зявки лучше чтоб был -> из insalon.id
$this->title = 'Заявка №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// todo: тоже самое - номер из insalon:
$this->params['breadcrumbs'][] = 'Заявка #'.$model->id;
?>

<div class="container bg-info text-info h2">

    <? if( $msgs = Yii::$app->session->getFlash('inbank_update') ): ?>
        <? foreach( $msgs as $msg ): ?>
            <?= $msg ?>
        <? endforeach; ?>
    <? endif; ?>
</div>

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

<div class="upload-list">
    <?= $this->render('_uploads',[
            'upload_model'=>$model->uploads,
    ]) ?>

</div>

<div class="message-list">

    <?= $this->render('_messages', [
        'messages' => $messages,
        //'messageDataProvider'=>$messageDataProvider,
        'inbank_model' => $model,
    ]) ?>

</div>

<!-- запомнить урл-->
<? Url::remember(); ?>

<div class="answer-form">
    <?= $this->render('_answer_form',['inbank_model'=>$model]) ?>
</div>

<div class="upload-file">
    <?= $this->render('_upload_form', ['upload_model'=>$upload_model] ) ?>
</div>