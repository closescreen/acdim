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

    <?= $this->render('_form', [
        'model' => $model,
        'states'=>$states,
    ]) ?>

</div>


