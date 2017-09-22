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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'states'=>$states,
    ]) ?>

</div>
