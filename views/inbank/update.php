<?php

use yii\helpers\Html;

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


<div class="message-list">

    <?= $this->render('_messages', [
        'messages' => $messages,
        //'messageDataProvider'=>$messageDataProvider,
        'inbank_model' => $model,
    ]) ?>

</div>