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
$this->params['breadcrumbs'][] = 'Заявка #'.$model->id. ' ('.$model->insalon->salon->name .')';
?>

<? $css_class = 'request-status-'.$model->state_id ?>
<div class=<?= $css_class?> >
    <h3><b><?= 'Статус: '.$states[$model->state_id] ?></b></h3>
</div>

<? if( $msgs = Yii::$app->session->getFlash('inbank_update') ): ?>
    <? foreach( $msgs as $msg ): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <? endforeach; ?>
<? endif; ?>

<div class="inbank-update">

    <?= $this->render('_view_form', [
        'model' => $model,
        'states'=>$states,
    ]) ?>

</div>


<div class="upload-list">
    <?= $this->render('_uploads',[
        'upload_model'=>$model->uploads,
    ]) ?>

</div>

<div class="upload-file">
    <?= $this->render('_upload_form', ['upload_model'=>$upload_model] ) ?>
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

